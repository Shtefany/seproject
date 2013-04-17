select mp.idMateria, mp.nombre, 
p.nombre, mpr.precio_lote, mpr.cantidad,
mp.unidad, mp.fecha_caducidad
from materia_prima mp, proveedor p, 
materia_proveedor mpr
where mp.idMateria = mpr.idMateria
and p.RFC = mpr.proveedor_RFC;