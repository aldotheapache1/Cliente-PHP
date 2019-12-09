<!Doctype HTML>
<html> 
	
	<head>
		<meta charset = UTF-8/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
	</head>
<body>
	<div class="card" style="margin: 10px">
        
        <div class="card-header">
            <h1 class="card-title">Editar Carro Cadastrado</h1>
		</div>

		<div class="card-body">
            
            <form class="form-inline" method="POST" action="trabalho.php" style="margin: 20px 0">
			    
			    <div class="form-group">
			        
			        <input name="id_alt" class="form-control" readOnly="readonly"
			            value="<?php echo $_POST["id"] ?>"/>
			        &nbsp;
			        <input name="placa_alt" type="text" class="form-control"
			            placeholder="Placa"
			            value="<?php echo $_POST["placa"] ?>"/>
			        &nbsp;
			        <button type="submit"
			            class="btn btn-primary">Salvar
					</button>
					
			    	</a>
			    </div>
			</form>
        </div>
    </div>
</body>
</html>