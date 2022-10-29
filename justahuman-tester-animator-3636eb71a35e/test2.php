<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8>
		<title>My first </title>
		
        <style>
			body { margin: 0; }
			canvas { width: 100%; height: 100% }
		</style>
	</head>
	<body>
		<script src="scenejs.js"></script>
		<script>
			var scene = SceneJS.createScene({
            nodes:[
                {
                    type:"material",
                    color: { r: 0.3, g: 0.3, b: 1.0 },
                    
                    nodes:[
                        {
                            type: "rotate",
                            id: "myRotate",
                            y: 1.0,
                            angle: 0,
                            
                            nodes: [
                                {
                                    type:"geometry/teapot"
                                }
                            ]
                        }
                    ]
                }
            ]
            });
		</script>
	</body>
</html>