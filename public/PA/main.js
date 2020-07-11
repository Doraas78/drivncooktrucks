import * as THREE from './three.js-master/build/three.module.js';

import {PointerLockControls} from './three.js-master/examples/jsm/controls/PointerLockControls.js';


import {ColladaLoader} from './three.js-master/examples/jsm/loaders/ColladaLoader.js';
import {GLTFLoader} from './three.js-master/examples/jsm/loaders/GLTFLoader.js';
import {FBXLoader} from './three.js-master/examples/jsm/loaders/FBXLoader.js';


import Stats from './three.js-master/examples/jsm/libs/stats.module.js';


//* Affichage des FPS *//


(function (fps) {
    var script = document.createElement('script');
    script.onload = function () {
        var stats = new Stats();
        document.body.appendChild(stats.dom);
        requestAnimationFrame(function loop() {
            stats.update();
            requestAnimationFrame(loop)
        });
    };


    script.src = '//mrdoob.github.io/stats.js/build/stats.min.js';
//script.src='./three.js-master/build/three.min.js';
    document.head.appendChild(script);
})()


//* DECLARATION DES VARIABLES PRINCIPALES *//

var camera, scene, renderer, controls;


var objects = [];

var raycaster;

var moveForward = false;
var moveBackward = false;
var moveLeft = false;
var moveRight = false;
var canJump = false;

var prevTime = performance.now();
var velocity = new THREE.Vector3();
var direction = new THREE.Vector3();

var clock = new THREE.Clock();

var mixer, mixer1, mixer2, mixer3, mixer4, mixer5;

var movSpeedX = 1;
var movSpeedZ = 1;

let cloudParticles = [], rain, rainGeo, rainCount = 50000, rainSound, rainBool = false;

var bus = new GLTFLoader();
var animateBus;


var tree = new GLTFLoader();
var tree1;


var cloud = new GLTFLoader();
var cloud1;


var voice;


init();
animate();

function init() {

    //* MISE EN PLACE DE LA SCENE *//

    scene = new THREE.Scene(); // scene
    scene.background = new THREE.Color(0xcce0ff); // couleur du plan
    scene.fog = new THREE.Fog(0xcce0ff, 500, 10000); //définition du brouillard linéraire
    scene.add(new THREE.AmbientLight(0x707070)); // Lumière ambiance de la scène

    var frontLight = new THREE.SpotLight(0xc4c4c4, 2);
    frontLight.position.set(0, 5000, 8000); // Arrière
    frontLight.castShadow = true;
    frontLight.shadow.mapSize.width = 10000;
    frontLight.shadow.mapSize.height = 10000;
    frontLight.shadow.camera.near = 30;
    frontLight.shadow.camera.far = 10000;
    frontLight.distance = 20000;
    frontLight.power = 3 * Math.PI;
    scene.add(frontLight);

    camera = new THREE.PerspectiveCamera(65, window.innerWidth / window.innerHeight, 1, 10000); // camera

    camera.position.x = -92;
    camera.position.y = 20;
    camera.position.z = 1300; 

    camera.lookAt(300, -500, -500);


    //* MISE EN PLACE DU POINTER LOCK CONTROL, CONTROLEUR DE LA SCENE *//


    controls = new PointerLockControls(camera, document.body);


    var blocker = document.getElementById('blocker');
    var instructions = document.getElementById('instructions');

    instructions.addEventListener('click', function () {

        controls.lock();

    }, false);

    controls.addEventListener('lock', function () {

        instructions.style.display = 'none';
        blocker.style.display = 'none';

    });

    controls.addEventListener('unlock', function () {

        blocker.style.display = 'block';
        instructions.style.display = '';

    });

    //scene.add( controls.getObject() );

    var onKeyDown = function (event) {

        switch (event.keyCode) {

            case 38: // up
            case 90: // w
                moveForward = true;
                break;

            case 37: // left
            case 81: // a
                moveLeft = true;
                break;

            case 40: // down
            case 83: // s
                moveBackward = true;
                break;

            case 39: // right
            case 68: // d
                moveRight = true;
                break;

            case 32: // space
                if (canJump === true) velocity.y += 350;
                canJump = false;
                break;
        }
    };

    var onKeyUp = function (event) {

        switch (event.keyCode) {

            case 38: // up
            case 90: // w
                moveForward = false;
                break;

            case 37: // left
            case 81: // a
                moveLeft = false;
                break;

            case 40: // down
            case 83: // s
                moveBackward = false;
                break;

            case 39: // right
            case 68: // d
                moveRight = false;
                break;

        }

    };

    document.addEventListener('keydown', onKeyDown, false);
    document.addEventListener('keyup', onKeyUp, false);

    raycaster = new THREE.Raycaster(new THREE.Vector3(), new THREE.Vector3(0, -1, 0), 0, 10);

    //* MISE EN PLACE DE LA TEXTURE SOL  *//

    //chargement de la texture en tant que surface
    var loader = new THREE.TextureLoader();
    var ground = loader.load('textures & images/grass3.jpg');

    // MeshLambertMaterial: définition de l'apparence de la texture sur la plaque
    var groundMaterial = new THREE.MeshPhongMaterial({map: ground});

    //PlaneBufferGeometry: dimensions de la plaque définissant le sol
    var groundMesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(15000, 15000), groundMaterial);

    groundMesh.position.y = -250;
    groundMesh.rotation.x = -Math.PI / 2;
    groundMesh.receiveShadow = true;

    //Nombre de fois où sera répété la texture, verticalement et horizontalement sur la plaque
    ground.wrapS = ground.wrapT = THREE.RepeatWrapping;
    ground.repeat.set(35, 35);

    //anisotropy: nombre d'échantillons prélevés le long de l'axe à travers le pixel qui a la densité de texels la plus élevée
    ground.anisotropy = 128; // propriété d'être dépendant de la direction

    scene.add(groundMesh);


    /* FOOD TRUCKS ET BATIMENTS */

	//FOOD TRUCK 1

    //chargement et ajout du Food Truck Central
    var foodTruck= new GLTFLoader();
    foodTruck.load('Objets3D/FoodTrucks/food_truck_2/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });

        let foodTruck = gltf.scene.children[0];
        foodTruck.scale.set(110,110,110);
        foodTruck.position.set(groundMesh.position.x, -250, -100); //position de l'objet
        foodTruck.rotation.set(300, 0, 0);
        scene.add(foodTruck);
    });

    //BOUTIQUE NOOK

    //chargement et ajout de la boutique Nook
    var nookStore  = new GLTFLoader();
    nookStore.load('Objets3D/Batiments/BoutiqueNook2/scene.gltf', function(gltf){

         gltf.scene.traverse( function ( child ){
              if ( child.isMesh )
                {
                  child.castShadow = true;
                  child.receiveShadow = false;
                }

    });

        let nookStore = gltf.scene.children[0];
        nookStore.scale.set(110,120,110);
        nookStore.position.set(groundMesh.position.x - 750, -150, -500); //position de l'objet
        nookStore.rotation.set(300,0,600);
        scene.add(nookStore);
    });    
    

    //BUS STATION

    //chargement et ajout de l'arrêt de bus 
    var busStation  = new GLTFLoader();
    busStation.load('Objets3D/Batiments/bus_station/scene.gltf', function(gltf){

         gltf.scene.traverse( function ( child ){
              if ( child.isMesh )
                {
                  child.castShadow = true;
                  child.receiveShadow = false;
                }

    });

        let busStation = gltf.scene.children[0];
        busStation.scale.set(16,16,16);
        busStation.position.set(groundMesh.position.x + 1200, -230, -500); //position de l'objet
        busStation.rotation.set(300,0,-2);
        scene.add(busStation);
    });    
    

    /* */


    /* OBJETS SUR LE BAR DU FOOD TRUCK 1 */

    //chargement et ajout de Monster
	var monster= new GLTFLoader();
	monster.load('Objets3D/Boissons/boisson_monster/scene.gltf', function (gltf) {

		gltf.scene.traverse(function (child) {
			if (child.isMesh) {
				child.castShadow = false;
				child.receiveShadow = true;
			}
		});

		let monster = gltf.scene.children[0];
		monster.scale.set(0.8,0.8,0.8);
		monster.position.set(groundMesh.position.x + 100, -110, -50); //position de l'objet
		monster.rotation.set(300, 0, 0.7);
		scene.add(monster);
	});

     //chargement et ajout de palladium
    var palladium= new GLTFLoader();
    palladium.load('Objets3D/Boissons/boisson_palladium_energy/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = false;
                child.receiveShadow = true;
            }
        });

        let palladium = gltf.scene.children[0];
        palladium.scale.set(1.7,1.7,1.7)
        palladium.position.set(groundMesh.position.x + 115, -110, -60); //position de l'objet
        palladium.rotation.set(300, 0, 0.7);
        scene.add(palladium);
    });


    //chargement et ajout bouteille de vin 
    
    var vin3= new GLTFLoader();
    vin3.load('Objets3D/Boissons/vin_3/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = false;
                child.receiveShadow = true;
            }
        });
        let  vin3 = gltf.scene.children[0];
        vin3.scale.set(2,2,2);
        vin3.position.set(groundMesh.position.x + 60, -115, -20);
        vin3.rotation.set(-1.58, 0, 0.6);
        scene.add(vin3);

    });

    //chargement et ajout boite pop corn 1

    var bucket1= new GLTFLoader();
    bucket1.load('Objets3D/Vaisselle/boite_pop_corn_1/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = false;
                child.receiveShadow = true;
            }
        });
        let bucket1 = gltf.scene.children[0];
         bucket1.scale.set(0.3,0.3,0.3);
         bucket1.position.set(groundMesh.position.x + 190, -115, -110);
         bucket1.rotation.set(-1.58, 0, 0.6);
        scene.add(bucket1);

    });

    //chargement et ajout boite pop corn 1.2

    var bucket1= new GLTFLoader();
    bucket1.load('Objets3D/Vaisselle/boite_pop_corn_1/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = false;
                child.receiveShadow = true;
            }
        });
        let bucket1 = gltf.scene.children[0];
         bucket1.scale.set(0.3,0.3,0.3);
         bucket1.position.set(groundMesh.position.x + 190, -110, -110);
         bucket1.rotation.set(-1.58, 0, 0.6);
        scene.add(bucket1);

    });

     //chargement et ajout boite pop corn 2

    var bucket2= new GLTFLoader();
    bucket2.load('Objets3D/Vaisselle/boite_pop_corn_2/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = false;
                child.receiveShadow = true;
            }
        });
        let bucket2 = gltf.scene.children[0];
         bucket2.scale.set(0.3,0.3,0.3);
         bucket2.position.set(groundMesh.position.x + 160, -115, -95);
         bucket2.rotation.set(-1.58, 0, 0.6);
        scene.add(bucket2);

    });

    //chargement et ajout boite pop corn 2.1

    var bucket2= new GLTFLoader();
    bucket2.load('Objets3D/Vaisselle/boite_pop_corn_2/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = false;
                child.receiveShadow = true;
            }
        });
        let bucket2 = gltf.scene.children[0];
         bucket2.scale.set(0.3,0.3,0.3);
         bucket2.position.set(groundMesh.position.x + 160, -110, -95);
         bucket2.rotation.set(-1.58, 0, 0.6);
        scene.add(bucket2);

    });


    /* */


    //chargement et ajout des bancs

    //Banc 1
	var banc1= new GLTFLoader();
	banc1.load('Objets3D/Meubles exterieurs/banc/scene.gltf', function (gltf) {

		gltf.scene.traverse(function (child) {
			if (child.isMesh) {
				child.castShadow = true;
				child.receiveShadow = false;
			}
		});

		let banc1 = gltf.scene.children[0];
		banc1.scale.set(2.8,2.8,2.8);
		banc1.position.set(groundMesh.position.x - 1100, -250, 350); //position de l'objet
		banc1.rotation.set(-1.58, 0, -0.5);
		scene.add(banc1);
	});

    //Banc 2
    var banc2= new GLTFLoader();
    banc2.load('Objets3D/Meubles exterieurs/banc/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });

        let banc2 = gltf.scene.children[0];
        banc2.scale.set(2.8,2.8,2.8);
        banc2.position.set(groundMesh.position.x - 450, -250, 550); //position de l'objet
        banc2.rotation.set(-1.58, 0, 2.5);
        scene.add(banc2);
    });

    //Fontaine
    //chargement et ajout de la fontaine 
    var foutain= new GLTFLoader();
    foutain.load('Objets3D/Meubles exterieurs/fountain/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });

        let foutain = gltf.scene.children[0];
        foutain.scale.set(45,45,45);
        foutain.position.set(groundMesh.position.x - 880, -250, 400); //position de l'objet
        foutain.rotation.set(-1.58, 0, 2.5);
        scene.add(foutain);
    });

    //Table haute
    //chargement et ajout de la table haute  
    var barTable= new GLTFLoader();
    barTable.load('Objets3D/Meubles exterieurs/table_haute/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });

        let  barTable = gltf.scene.children[0];
        barTable.scale.set(1.1,1.1,1.1);
        barTable.position.set(groundMesh.position.x - 200, -250, 100); //position de l'objet
        barTable.rotation.set(300, 0, 0);
        scene.add(barTable);
    });

    //Parasol
    //chargement et ajout du parasol
    var parasol= new GLTFLoader();
    parasol.load('Objets3D/Meubles exterieurs/parasol1/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });

        let parasol = gltf.scene.children[0];
        parasol.scale.set(3.5,3.5,3.5);
        parasol.position.set(groundMesh.position.x - 280, -102, 100); //position de l'objet
        parasol.rotation.set(300, 0, 0);
        scene.add(parasol);
    });

    //Starbucks sur table 1
    //chargement et ajout du café
     var coffee= new GLTFLoader();
    coffee.load('Objets3D/Boissons/bouteille_de_cafe/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });

        let  coffee = gltf.scene.children[0];
        coffee.scale.set(1.5,1.5,1.5);
        coffee.position.set(groundMesh.position.x - 180, -120, 100); //position de l'objet
        coffee.rotation.set(300, 0, 0);
        scene.add(coffee);
    });

    //Coca sur table
    //chargement et ajout de coca en verre 
    var coca= new GLTFLoader();
    coca.load('Objets3D/Boissons/coca_cola_verre/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = false;
                child.receiveShadow = false;
            }
        });

        let  coca = gltf.scene.children[0];
        coca.scale.set(0.03,0.03,0.03);
        coca.position.set(groundMesh.position.x - 220, -110, 100); //position de l'objet
        coca.rotation.set(300, 0, 0);
        scene.add(coca);
    });



    /* PIC NIQUE TABLES GARNIS */

	//chargement et ajout des tables de pic nique et composants

	var table1,table2,table3,table4;

	/*VIN*/
    //Ajout des vins
    //vin 1 table 1
    var vin1= new GLTFLoader();
    vin1.load('Objets3D/Boissons/vin_1/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });
        let vin1  = gltf.scene.children[0];
        vin1.scale.set(0.15,0.15,0.15);
        vin1.position.set(groundMesh.position.x + 100, -135, 670);
        vin1.rotation.set(-1.58, 0, 0.6);
        scene.add(vin1);

    });

    //vin 2 table 4

    var vin2= new GLTFLoader();
    vin2.load('Objets3D/Boissons/vin_2/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });
        let  vin2 = gltf.scene.children[0];
        vin2.scale.set(16,16,16);
        vin2.position.set(groundMesh.position.x + 810, -160, 1050);
        vin2.rotation.set(-1.58, 0, 0.6);
        scene.add(vin2);

    });
    
	//chargement et ajout de la table 1
	table1= new GLTFLoader();
	table1.load('Objets3D/Meubles exterieurs/table_de_pic_nique/scene.gltf', function (gltf) {

		gltf.scene.traverse(function (child) {
			if (child.isMesh) {
				child.castShadow = true;
				child.receiveShadow = false;
			}
		});
		let table1 = gltf.scene.children[0];
		table1.scale.set(0.03,0.03,0.03);
		table1.position.set(groundMesh.position.x + 100, -250, 650);
		table1.rotation.set(-1.58, 0, 0.6);
		scene.add(table1);

	});

	//chargement et ajout du 1er plat
	var plat1= new GLTFLoader();
	plat1.load('Objets3D/Plats et sauces/assiette_avec_pizza/scene.gltf', function (gltf) {

		gltf.scene.traverse(function (child) {
			if (child.isMesh) {
				child.castShadow = true;
				child.receiveShadow = false;
			}
		});
		let plat1 = gltf.scene.children[0];
		plat1.scale.set(0.25,0.25,0.25);
		plat1.position.set(groundMesh.position.x + 50, -160, 670);
		plat1.rotation.set(-1.58, 0, 0.6);
		scene.add(plat1);

	});

	//chargement et ajout de la table 2
	table2= new GLTFLoader();
	table2.load('Objets3D/Meubles exterieurs/table_de_pic_nique/scene.gltf', function (gltf) {

		gltf.scene.traverse(function (child) {
			if (child.isMesh) {
				child.castShadow = true;
				child.receiveShadow = false;
			}
		});
		let table2 = gltf.scene.children[0];
		table2.scale.set(0.03,0.03,0.03);
		table2.position.set(groundMesh.position.x + 600, -250, 600);
		table2.rotation.set(-1.58, 0, 0.6);
		scene.add(table2);

	});

    //chargement et ajout du 2eme plat
    var plat2= new GLTFLoader();
    plat2.load('Objets3D/Plats et sauces/burger_et_frites2/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });
        let plat2 = gltf.scene.children[0];
        plat2.scale.set(0.5,0.5,0.5);
        plat2.position.set(groundMesh.position.x + 580, -160, 630);
        plat2.rotation.set(-1.58, 0, 0.6);
        scene.add(plat2);

    });

    //chargement et ajout sauce1
    var sauce1= new GLTFLoader();
    sauce1.load('Objets3D/Plats et sauces/set_de_sauces/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });
        let sauce1 = gltf.scene.children[0];
        sauce1.scale.set(150,150,150);
        sauce1.position.set(groundMesh.position.x + 590, -148, 600);
        sauce1.rotation.set(-1.58, 0, 0.6);
        scene.add(sauce1);

    });

    //chargement et ajout de la table 3

	table3= new GLTFLoader();
	table3.load('Objets3D/Meubles exterieurs/table_de_pic_nique/scene.gltf', function (gltf) {

		gltf.scene.traverse(function (child) {
			if (child.isMesh) {
				child.castShadow = true;
				child.receiveShadow = false;
			}
		});
		let table3 = gltf.scene.children[0];
		table3.scale.set(0.03,0.03,0.03);
		table3.position.set(groundMesh.position.x + 320, -250, 1100);
		table3.rotation.set(-1.58, 0, 0.6);
		scene.add(table3);

	});

    //chargement et ajout du 3e plat
    var plat3= new GLTFLoader();
    plat3.load('Objets3D/Plats et sauces/plat_japonais/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });
        let plat3 = gltf.scene.children[0];
        plat3.scale.set(8,8,8);
        plat3.position.set(groundMesh.position.x + 300 , -148, 1067);
        plat3.rotation.set(-1.58, 0, 0.6);
        scene.add(plat3);

    });

    //chargement et ajout de la 2e sauce 
    var sauce2= new GLTFLoader();
    sauce2.load('Objets3D/Plats et sauces/set_de_sauces/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });
        let sauce2 = gltf.scene.children[0];
        sauce2.scale.set(150,150,150);
        sauce2.position.set(groundMesh.position.x + 260 , -148, 1130);
        sauce2.rotation.set(-1.58, 0, 0.6);
        scene.add(sauce2);

    });



    //chargement et ajout de la table 4

    table4= new GLTFLoader();
    table4.load('Objets3D/Meubles exterieurs/table_de_pic_nique/scene.gltf', function (gltf) {

            gltf.scene.traverse(function (child) {
                if (child.isMesh) {
                    child.castShadow = true;
                    child.receiveShadow = false;
                }
            });
            let table4 = gltf.scene.children[0];
            table4.scale.set(0.03,0.03,0.03);
            table4.position.set(groundMesh.position.x + 800, -250, 1050);
            table4.rotation.set(-1.58, 0, 0.6);
            scene.add(table4);

	});

    //chargement et ajout du 4e plat
    var plat4= new GLTFLoader();
    plat4.load('Objets3D/Plats et sauces/burger_et_frites4/scene.gltf', function (gltf) {

            gltf.scene.traverse(function (child) {
                if (child.isMesh) {
                    child.castShadow = true;
                    child.receiveShadow = false;
                }
            });
            let plat4 = gltf.scene.children[0];
            plat4.scale.set(9,9,9);
            plat4.position.set(groundMesh.position.x + 744, -148, 1052);
            plat4.rotation.set(-1.58, 0, 2.1);
            scene.add(plat4);

    });
   


	/* MENUUUUU */
    //chargement et ajout de la carte de menu

    var menu= new GLTFLoader();
    menu.load('Objets3D/Meubles exterieurs/menu_sign/scene.gltf', function (gltf) {

        gltf.scene.traverse(function (child) {
            if (child.isMesh) {
                child.castShadow = true;
                child.receiveShadow = false;
            }
        });
        let menu = gltf.scene.children[0];
        menu.scale.set(0.5,0.5,0.5);
        menu.position.set(groundMesh.position.x + 300, -150, 20);
        menu.rotation.set(-1.58, 0, 1.4);
        scene.add(menu);

    });

    /* BATIMENTS */









	//bus qui bouge

           //chargement et ajout du bus animé

          bus.load('Objets3D/FoodTrucks/taxi/scene.gltf', function(gltf)
           {
               gltf.scene.traverse( function ( child )
               {
                   if ( child.isMesh )
                   {
                       child.castShadow = true;
                       child.receiveShadow = false;
                   }
               });
            animateBus = gltf.scene.children[0];
            animateBus.scale.set(40,40,40);
            animateBus.position.set(groundMesh.position.x+ 2100, groundMesh.position.y - 30, 500); 


            animateBus.rotation.set(300,0,2.5);
            scene.add(animateBus);
           });


    //* OBJETS ANIMES *//


    //personnage animé: papillon qui vole 1
    var loaderfbx = new FBXLoader();
    loaderfbx.load( 'Objets3D/Animés/Butterfly1/source/butterfly animation.fbx', function ( object ) {

        mixer = new THREE.AnimationMixer( object );

        var action = mixer.clipAction( object.animations[ 0 ] );
        action.play();

        object.traverse( function ( child ) {

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = true;

            }

        } );
        object.scale.set(8,8,8);
        object.position.set(-150, 0, 900);
        object.rotation.set(0,0.5,0);
        scene.add( object );

    } );


    //personnage animé: papillon qui vole 2
    var loaderfbx = new FBXLoader();
    loaderfbx.load( 'Objets3D/Animés/Butterfly1/source/butterfly animation.fbx', function ( object ) {

        mixer3 = new THREE.AnimationMixer( object );

        var action = mixer3.clipAction( object.animations[ 0 ] );
        action.play();

        object.traverse( function ( child ) {

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = true;

            }

        } );
        object.scale.set(7,7,7);
        object.position.set(-100, -50, 900);
        object.rotation.set(0.5,0,0);
        scene.add( object );

    } );

    //personnage animé: Coucou !
    var loaderfbx = new FBXLoader();
    loaderfbx.load( 'Objets3D/Animés/Coucou.fbx', function ( object ) {

        mixer1 = new THREE.AnimationMixer( object );

        var action = mixer1.clipAction( object.animations[ 0 ] );
        action.play();
        object.traverse( function ( child ) {

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = true;

            }

        } );
        object.scale.set(0.5,0.5,0.5);
        object.position.set(100, -250, 100);
        
        scene.add( object );

    } );

   /*/personnage animé: Adam assis
    var loaderfbx = new FBXLoader();
    loaderfbx.load( 'Objets3D/Animés/Adam.fbx', function ( object ) {

        mixer2 = new THREE.AnimationMixer( object );

        var action = mixer2.clipAction( object.animations[ 0 ] );
        action.play();

        object.traverse( function ( child ) {

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = false;

            }

        } );
        object.scale.set(0.95,0.95,0.95);
        object.position.set(-1020, -240, 300);
        object.rotation.set(0,1,0);
        
        scene.add( object );

    } );

    //personnage animé: Fille table pic_nic
    var loaderfbx = new FBXLoader();
    loaderfbx.load( 'Objets3D/Animés/Waiting.fbx', function ( object ) {

        mixer4 = new THREE.AnimationMixer( object );

        var action = mixer4.clipAction( object.animations[ 0 ] );
        action.play();

        object.traverse( function ( child ) {

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = false;

            }

        } );
        object.scale.set(1,1,1);
        object.position.set(120, -270, 740);
        object.rotation.set(0,0.5,0);
        
        scene.add( object );

    } );*/

     //personnage animé: Fille qui danse 
    var loaderfbx = new FBXLoader();
    loaderfbx.load( 'Objets3D/Animés/Dance.fbx', function ( object ) {

        mixer5 = new THREE.AnimationMixer( object );

        var action = mixer5.clipAction( object.animations[ 0 ] );
        action.play();

        object.traverse( function ( child ) {

            if ( child.isMesh ) {

                child.castShadow = true;
                child.receiveShadow = false;

            }

        } );
        object.scale.set(1,1,1);
        object.position.set(1200, -240, -450);
        
        scene.add( object );

    } );



    //* MUSIQUE DE FOND DE LA SCENE *//

    //  Ajout de la fonction pour ajouter un audio
    var listener = new THREE.AudioListener();
    camera.add(listener);

    // Création de la musique de la scène
    var sound = new THREE.Audio(listener);

    // Téléchargement de la musique et ajustements
    var audioLoader = new THREE.AudioLoader();
    audioLoader.load('sounds/Bad Guy.mp3', function (buffer) {
        sound.setBuffer(buffer);
        sound.setLoop(true);
        sound.setVolume(2);
        sound.play();
    });

    //* SON DE POSITION *//

    //  Ajout de la fonction pour ajouter un audio

    var listener = new THREE.AudioListener();
    camera.add(listener);

    // Création de la musique de la scène

    voice = new THREE.PositionalAudio(listener);

    // Téléchargement de la musique et ajustements

    var audioLoader = new THREE.AudioLoader();
    audioLoader.load('sounds/voice.mp3', function (buffer) {
        voice.setBuffer(buffer);
        voice.setRefDistance(0.1);
        voice.setLoop(true);
        voice.setVolume(500);
        //voice.stop();
    });


    //* SON DE RAIN *//


    //  Ajout de la fonction pour ajouter un audio

    var listener = new THREE.AudioListener();
    camera.add(listener);

    // Création de la musique de la scène

    rainSound = new THREE.PositionalAudio(listener);

    // Téléchargement de la musique et ajustements

    var audioLoader = new THREE.AudioLoader();
    audioLoader.load('sounds/rain.mp3', function (buffer) {
        rainSound.setBuffer(buffer);
        rainSound.setRefDistance(1);
        rainSound.setLoop(true);
        rainSound.setVolume(100);
        rainSound.play();
        rainSound.stop();
    });


    //* GUI *//

    displaygui();

    function displaygui() {
        var gui = new dat.GUI();
        var parameters = {
            //musique d'ambiance
            music: "",
            volume: 2,
            movSpeedX: 1,
            movSpeedZ: 1,
            rainer: false
        };

        var sounds = gui.addFolder('Music scene');

        var soundVolume = sounds.add(parameters, 'volume').min(0).max(4).step(0.1).name('Volume');
        soundVolume.onChange(function (changed) {
            sound.setVolume(changed);

        });
        var song = sounds.add(parameters, 'music', ['sounds/Love foolosophy.mp3', 'sounds/Me and You.mp3', 'sounds/moderation.mp3', 'sounds/Bad Guy.mp3', 'sounds/gamecube.mp3', 'sounds/rain.mp3']).name("Song")
        song.onChange(function (changed) {
            sound.stop();
            audioLoader.load(changed, function (buffer) {
                sound.setBuffer(buffer);
                sound.setLoop(true);
                sound.setVolume(0.5);
                sound.play();
            })
        });

        var navig = gui.addFolder('Navigation');

        var movingSpeedX = navig.add(parameters, 'movSpeedX').min(-1).max(2).step(0.1).name('Speed X');
        movingSpeedX.onChange(function (changed) {
            movSpeedX = changed;

        });
        var movingSpeedZ = navig.add(parameters, 'movSpeedZ').min(-1).max(2).step(0.1).name('Speed Z');
        movingSpeedZ.onChange(function (changed) {
            movSpeedZ = changed;

        });


        var weather = gui.addFolder('Rain Control');

        var rainControl = weather.add(parameters, 'rainer').name('Raining');
        rainControl.onChange(function (changed) {
            rainBool = changed;
            cloud.visible = changed;

            if (changed) {
                rainSound.play();
            } else {
                rainSound.stop();
            }
        });
    }


    //* RENDU DE LA SCENE *//
    renderer = new THREE.WebGLRenderer({antialias: true});
    renderer.setPixelRatio(window.devicePixelRatio);
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.shadowMap.enabled = true;
    document.body.appendChild(renderer.domElement);
    //

    window.addEventListener('resize', onWindowResize, false);

    /*
    * GÉNÉRATION DE LA VÉGÉTATION & NUAGES
    *
    */
    /*
    * Fonctions utiles
    */

// But : Retourne aléatoirement un double entre {min} et {max}
    function getRandomArbitrary(min, max) {
        return Math.random() * (max - min) + min;
    }

// But : Retourne aléatorement un entier enter {min} et {max}. Minimum est inclus, et le maximum exclu.
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min)) + min;
    }

    /*
    * Fonction de création d'un objet unique. Position et tailles requises
    */


    /* TREE */

    var treeClone = "tree"; 
    var i = 0;

    create_tree_initial();

    function create_tree_initial(x, y, z, scale) {
        tree.load('Objets3D/Arbres/Tree1/scene.gltf', function (gltf) {
            gltf.scene.traverse(function (child) {
                if (child.isMesh) {
                    child.castShadow = true;
                    child.receiveShadow = false;
                }
            });
            tree1 = gltf.scene.children[0];
            create_tree_forest();
        });
    }

// But : Créer un arbre de grande taille, avec des branches détaillés (scale) plus ou moins grandes à une position donnée
    function create_tree(x, y, z, scale) {
        treeClone += i;
        treeClone = tree1.clone();
        treeClone.scale.set(scale, scale, scale);
        treeClone.position.set(x, y, z); // position de l'objet
        scene.add(treeClone);
        i++;
    }


// But : Créer une forêt d'arbres normaux. Ne prends rien en paramètre
    function create_tree_forest() {
        var lign = 5;
        var col = 5;
        var initial_x = -3000;
        var initial_y = groundMesh.position.y
        var initial_z = -2000;
        var x_gap = 2000;
        var z_gap = 2000;
        var random_min_gap = 200;
        var random_max_gap = 2000;
        var random_min_height = 50;
        var random_max_height = 70;
        for (var i = 0; i < col; i++) {
            for (var j = 0; j < lign; j++) {
                create_tree(
                    initial_x + (x_gap * j) + getRandomInt(random_min_gap, random_max_gap),
                    initial_y,
                    initial_z + (z_gap * i) + getRandomInt(random_min_gap, random_max_gap),
                    getRandomInt(random_min_height, random_max_height));
            }
        }
    }

 

    /* CLOUD */


    var cloudClone = "cloud";
    i = 0;
    create_cloud_initial();

    function create_cloud_initial() {
        cloud.load('Objets3D/Nature/Clouds/cloud1/scene.gltf', function (gltf) {
            cloud1 = gltf.scene.children[0];
            create_all_cloud();
        });
    }

// But : Créer un objet nuage unique, avec une position et une taille donnée.
    function create_cloud(x, y, z, scale) {
        cloudClone += i;
        cloudClone = cloud1.clone();
        cloudClone.scale.set(scale, scale, scale);
        cloudClone.position.set(x, y, z); // position de l'objet
        scene.add(cloudClone);
        i++;
    }


// But : Créer une forêt de nuages normaux. Ne prends rien en paramètre
    function create_all_cloud() {
        var lign = 20;
        var col = 20;
        var initial_x = -8000 + 1000;
        var initial_y = 4000;
        var initial_z = -7000 + 1000;
        var x_gap = 2000;
        var z_gap = 2000;
        var random_min_gap = 100;
        var random_max_gap = 2000;
        var random_min_height = 30;
        var random_max_height = 150;
        for (var i = 0; i < col; i++) {
            for (var j = 0; j < lign; j++) {
                create_cloud(
                    initial_x + (x_gap * j) + getRandomInt(random_min_gap, random_max_gap),
                    initial_y,
                    initial_z + (z_gap * i) + getRandomInt(random_min_gap, random_max_gap),
                    getRandomInt(random_min_height, random_max_height)
                );
            }
        }
    }

    rainF();


}

function rainF() {

    //Creation des permiètre aléatoire de goutes d'eau
    rainGeo = new THREE.Geometry();
    for (let i = 0; i < rainCount; i++) {
        let rainDrop = new THREE.Vector3(
            Math.random() * 20000 - 15000,
            Math.random() * 20000 - 15000,
            Math.random() * 20000 - 15000
        );

        //velocité de chute d'eau
        rainDrop.velocity = {};
        rainDrop.velocity = 0;

        //creation du tableau d'eau
        rainGeo.vertices.push(rainDrop);
    }

    //Definition du materiel
    let rainMaterial = new THREE.PointsMaterial({
        color: 0xaaaaaa,
        size: 1.5,
        transparent: true
    });

    //Creation de la pluie (tableaux de goutes d'eau plus matereriel
    rain = new THREE.Points(rainGeo, rainMaterial);
    scene.add(rain);

    //Definition du materiel
    let cloudLoader = new THREE.TextureLoader();
    cloudLoader.load("cloud.png", function (texture) {
    


        //Creation et definition de la taille du nuage
        let cloudGeo = new THREE.PlaneBufferGeometry(6000, 6000);

        //Definition du materiel
        let cloudMaterial = new THREE.MeshLambertMaterial({
            map: texture,
            side: THREE.DoubleSide,
            transparent: true
        });

        //Creation du nuage
        cloud = new THREE.Mesh(cloudGeo, cloudMaterial);
        cloud.position.set(
            -500,
            1300,
            800
        );
        cloud.rotation.x = 1.16;
        //cloud.rotation.y = -0.13;
        cloud.rotation.z = Math.random() * 360;
        cloud.material.opacity = 0.6;
        cloudParticles.push(cloud);
        cloud.visible = false;
        scene.add(cloud);

    });
}

function onWindowResize() {

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize(window.innerWidth, window.innerHeight);

}

function animate() {

    //Rain + Cloud Animation
    if (rainBool == true) {
        cloudParticles.forEach(p => {
            p.rotation.z -= 0.001;
        });

        rainGeo.vertices.forEach(p => {
            p.velocity -= 0.5 + Math.random() * 0.5;
            p.y += p.velocity;
            if (p.y < -200) {
                p.y = 200;
                p.velocity = 0;
            }
        });
        rainGeo.verticesNeedUpdate = true;
        rain.rotation.y += 0.001;
    }

    requestAnimationFrame(animate);

    if (controls.isLocked === true) {

        raycaster.ray.origin.copy(controls.getObject().position);
        raycaster.ray.origin.y -= 10;

        var intersections = raycaster.intersectObjects(objects);

        var onObject = intersections.length > 0;

        var time = performance.now();
        var delta = (time - prevTime) / 1000;

        // velocity: vitesse de déplacement sur les différents axes
        velocity.x -= velocity.x * movSpeedX * delta;
        velocity.z -= velocity.z * movSpeedZ * delta;

        velocity.y -= 9.8 * 100.0 * delta; // 100.0 = mass

        direction.z = Number(moveForward) - Number(moveBackward);
        direction.x = Number(moveRight) - Number(moveLeft);
        direction.normalize(); // this ensures consistent movements in all directions

        if (moveForward  || moveBackward) velocity.z -= direction.z * 400.0 * delta;
            if (moveLeft || moveRight) velocity.x -= direction.x * 400.0 * delta;

            if (onObject === true) {

                velocity.y = Math.max(0, velocity.y);
                canJump = true;

            }

            controls.moveRight(-velocity.x * delta);
            controls.moveForward(-velocity.z * delta);

            controls.getObject().position.y += (velocity.y * delta); // new behavior

            if (controls.getObject().position.y < 10) {

                velocity.y = 0;
                controls.getObject().position.y = 10;

                canJump = true;
            }

            prevTime = time;

        }


        var delta = clock.getDelta();
    // animation des objets FBX
    if (mixer) mixer.update(delta);
    if (mixer1) mixer1.update(delta);
    //if (mixer2) mixer2.update(delta);
    if (mixer3) mixer3.update(delta);
    //if (mixer4) mixer4.update(delta);
    if (mixer5) mixer5.update(delta);



    //Moving Bus
        if (animateBus.position.x > 20){
             animateBus.position.z -= 2;
             animateBus.position.x -= 3;
            
        }

      


    renderer.render(scene, camera);
}
