BEGIN
DECLARE CantProductos INT;
DECLARE CantEmpleados INT;
DECLARE CantEmpleadosAsig INT;
DECLARE CanMostrar INT;
DECLARE CanSobrante INT;

SELECT COUNT(*) INTO CantProductos FROM productos WHERE sucursal_id = vIdSucursal AND empresa_id = vIdEmpresa
AND condicion = CONVERT(vCondicion,CHAR(01));
SELECT Count(*) INTO CantEmpleados FROM users;
SET CantEmpleados= CantEmpleados -1;
SELECT Count(EM.id) INTO CantEmpleadosAsig FROM users  AS EM
LEFT JOIN asignar_producto_empleados AS APE ON EM.id = APE.user_id 
WHERE APE.user_id IS NULL AND APE.lote_id = vIdLote AND EM.id !=1;


SET CanMostrar = TRUNCATE(CantProductos / CantEmpleados,0);
SET CanSobrante = CantProductos % CantEmpleados;

IF CantEmpleadosAsig = 1
THEN
SET CanMostrar = CanMostrar + CanSobrante;
END IF;
IF  CONVERT(vCondicion,CHAR(01))='N' THEN

SELECT PRO.*, su.nombre as sucursal , em.nombre as empresa FROM productos AS PRO
LEFT JOIN asignar_producto_empleados AS APE ON PRO.id = APE.producto_id 
INNER JOIN  sucursals AS su
ON PRO.sucursal_id = su.id
inner join empresas  as em
on PRO.empresa_id = em.id
WHERE PRO.sucursal_id = vIdSucursal AND PRO.empresa_id = vIdEmpresa
AND condicion = CONVERT(vCondicion,CHAR(01))
AND APE.producto_id is NULL
LIMIT CanMostrar;
END IF;
IF  CONVERT(vCondicion,CHAR(01))='R' THEN
SELECT PRO.*, su.nombre as sucursal , em.nombre as empresa FROM productos AS PRO
INNER JOIN asignar_producto_empleados AS APE ON PRO.id = APE.producto_id 
INNER JOIN  sucursals AS su
ON PRO.sucursal_id = su.id
inner join empresas  as em
on PRO.empresa_id = em.id
WHERE PRO.sucursal_id = vIdSucursal AND PRO.empresa_id = vIdEmpresa
AND PRO.condicion = CONVERT(vCondicion,CHAR(01)) AND ( SELECT COUNT(*) FROM asignar_producto_empleados AS APE2 WHERE APE2.producto_id = APE.producto_id AND APE2.estado = 'PENDIENTE' ) = 0
LIMIT CanMostrar;
END IF;
END