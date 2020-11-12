<?php 

/* 
	get_property_args() and so on... must load first
*/

include('theme-sistemasweb/functions.php'); 

include('theme-sistemasweb/rewrite.php');
include('theme-sistemasweb/filters.php');
include('theme-sistemasweb/seo.php');
include('theme-sistemasweb/ajax.php');
/*

private $config = [
    'apiurl' => 'http://real.sistemasweb.uy/',
    'user_id' => 'real_user',
    'user_pass' => 'real*20prop',
];

http://real.sistemasweb.uy/ws_listar/ws_listar.php?user_id=real_user&user_pass=real*20prop


http://blueprop.sistemasweb.uy/ws_listar/ws_listar.php?user_id=bluuser&user_pass=blue19*prop

	EJEMPLO POST XML

	<post>

		<Referencia>3517</Referencia>
		
		<venta>N</venta>
		
		<alquiler>N</alquiler>
		
		<alquiler_temporario>N</alquiler_temporario>
		
		<Destacado>N</Destacado>
		
		<Título>Departamento en venta en San Rafael </Título>
		
		<Descripcion>
		Lindo departamento muy bien ubicado. Cuenta con un cómodo living/comedor con cocina integrada, 1 dormitorio y medio, baño y amplio balcón con parrillero propio. El edificio cuenta con portería las 24 hrs, piscina abierta y cerrada, sauna, gimnasio, micro cine, sala para niños y adultos.
		</Descripcion>
		
		<Direccion>Av. San Remo casi Laureano Alonso Perez</Direccion>
		
		<Localidad>Punta del Este</Localidad>
		
		<Zona>San Rafael</Zona>

	<thumb>
	http://sistemasweb.uy/sistemas/blueprop/sistema/_lib/file/img3517/thumb.jpg
	</thumb>
	<Foto1>
	http://sistemasweb.uy/sistemas/blueprop/sistema/_lib/file/img3517/P1240347 (Copiar).JPG
	</Foto1>
	<Foto2>
	http://sistemasweb.uy/sistemas/blueprop/sistema/_lib/file/img3517/P1370139 (Copiar).JPG
	</Foto2>
	<Foto3> .... [HASTA FOTO 30]

	<Latitud>-34.9340454</Latitud>
	<Longitud>-54.9235872</Longitud>
	
	<Tipo_Propiedad>Departamento</Tipo_Propiedad>
	
	<Precio_Venta>0</Precio_Venta>
	<Precio_Temporada>0</Precio_Temporada>
	<Precio_alquiler>0</Precio_alquiler>
	
	<Baños>1</Baños>
	<Dormitorios>1</Dormitorios>
	<Mts_Edificado_Totales>0</Mts_Edificado_Totales>
	<Mts_Terreno>0</Mts_Terreno>
	<Cochera>S</Cochera>
	
	<Vista_al_mar>N</Vista_al_mar>
	<Primera_Fila>N</Primera_Fila>
	<Dependencia_de_servicio>N</Dependencia_de_servicio>
	<Piscina>S</Piscina>
	<Calefaccion>S</Calefaccion>
	<Parrillero_propio>S</Parrillero_propio>
	<Financiacion>N</Financiacion>
	<Emprendimiento_en_Pozo>N</Emprendimiento_en_Pozo>

</post>
*/