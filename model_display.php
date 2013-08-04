<!doctype html>
<html lang="en">
    <head>
	<title>BRL-CAD Standalone model</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
	<link rel=stylesheet href="css/base.css"/>
    </head>
    <body>
	<script src="js/Three.js"></script>
	<script src="js/Detector.js"></script>
	<script src="js/Stats.js"></script>
	<script src="js/loaders/OBJLoader.js"></script>
	<script src="js/OrbitControls.js"></script>
	<script src="js/THREEx.FullScreen.js"></script>
	<script src="js/THREEx.WindowResize.js"></script>
	<div id="ThreeJS" style="z-index: 1; position: absolute; left:0px; top:0px"></div>
	<script>
	
	    /* standard global variables */
	    var container, scene, camera, renderer, controls, stats;
	    var clock = new THREE.Clock();

	    /* custom global variables */
	    var cube;

	    /* initialization */
	    init();

	    /* animation loop / game lop */
	    animate();
			
	    function init() 
	    {
		/* scene */
		scene = new THREE.Scene();
		
		/* set the view size in pixels (custom or according to window size)
		 *  var SCREEN_WIDTH = 400, SCREEN_HEIGHT = 300; */ 
		var SCREEN_WIDTH = window.innerWidth, SCREEN_HEIGHT = window.innerHeight;	

		/* camera attributes */
		var VIEW_ANGLE = 45, ASPECT = SCREEN_WIDTH / SCREEN_HEIGHT, NEAR = 0.1, FAR = 20000000;

		/* set up camera */
		camera = new THREE.PerspectiveCamera( VIEW_ANGLE, ASPECT, NEAR, FAR);

		/* add the camera to the scene */
		scene.add(camera);

		/* set camera position (default position is (0,0,0)) and set the angle towards the scene origin */
		camera.position.set(1000, 1000, 1000);
		camera.lookAt(scene.position);	
			
		/* create and start the renderer; choose antialias setting. */
		if ( Detector.webgl ) {
		    renderer = new THREE.WebGLRenderer( {antialias:true} );
		} else {
			renderer = new THREE.CanvasRenderer(); 
		}
		    renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
			
		    /* attach div element to variable to contain the renderer */
		    container = document.getElementById( 'ThreeJS' );
	    			
		    /* attach renderer to the container div */
		    container.appendChild( renderer.domElement );
			
		    /* automatically resize renderer */
		    THREEx.WindowResize(renderer, camera);
			
		    /* toggle full-screen on given key press */
		    THREEx.FullScreen.bindKey({ charCode : 'm'.charCodeAt(0) });
			
		    /* CONTROLS */
	
			/* move mouse and: left   click to rotate, 
			 * middle click to zoom, 
			 * right  click to pan */
		    controls = new THREE.OrbitControls( camera, renderer.domElement );
			
		    /* STATS */
			
		    /* displays current and past frames per second attained by scene */
		    stats = new Stats();
		    stats.domElement.style.position = 'absolute';
		    stats.domElement.style.bottom = '0px';
		    stats.domElement.style.zIndex = 100;
		    container.appendChild( stats.domElement );
			
		    /* LIGHT */
			
		    /* create a light */
		    var light = new THREE.PointLight(0xffffff);
		    light.position.set(0,250,0);
		    scene.add(light);

		    var ambientLight = new THREE.AmbientLight(0x111111);
		    scene.add(ambientLight);
		    
		    var directionalLight = new THREE.DirectionalLight( 0xffeedd );
		    directionalLight.position.set( 1000, 1000, 1000 );
		    scene.add( directionalLight );

		    /* GEOMETRY */
			
		    /* create a set of coordinate axes to help orient user 
		     * specify length in pixels in each direction */
		    var axes = new THREE.AxisHelper(10000);
		    scene.add( axes );

		    <?php 
		    echo "var i = '".$_GET['obj']."'"; 
		//  echo "var n = ".$_GET['n'];
		    ?>
			
		    var objFile = new Array();
		    objFile = i.split("|");	

		    document.write("array content: ");
		    for (var h=0; h<=objFile.length-1; h++ ) {
		    document.write(objFile[h]+" ");
		    }

		    function multipleOBJLoader( objFile ) 
		    {	    
		    /* material of OBj model */                                          
	    	    var OBJMaterial = new THREE.MeshPhongMaterial( {color: 0x8888ff} );
		    var loader = new THREE.OBJLoader();
		        loader.load(objFile[k], function ( object ) {
			    object.traverse ( function ( child ) 
		    	    {
			        if ( child instanceof THREE.Mesh ) {
			            child.material = OBJMaterial;
			        }
			    } );
			    object.position.y = 0.1;
			    scene.add( object );
		        } );	
		    }

		    for (k = 1; k <= objFile.length-1; k++ ) {
			multipleOBJLoader(objFile);
		    }

		}

		function animate() 
		{
		    requestAnimationFrame( animate );
		    render();		
		    update();
		}

		function update()
		{	
		    controls.update();
		    stats.update();
		}

		function render() 
		{	
		    renderer.render( scene, camera );
		}
</script>
</body>
</html>
