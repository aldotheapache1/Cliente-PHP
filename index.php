<!Doctype HTML>
<?php
 class metodos{
        public function listarTodos(){
            return json_decode(file_get_contents('http://localhost:8080/rest/carros'));
        }

        public function buscarCarro($placa){
            foreach($this->listarTodos() as $carro){
                if($carro->placa == $placa){
                    return True;
                }
            }
            return False;
        }

        public function salvar($placa){
            if(!$this->buscarCarro($placa)){
                $urlAPI = "http://localhost:8080/rest/carros";
                $ch = curl_init($urlAPI);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, ['placa' => $placa]);
                curl_exec($ch);
                curl_close($ch);
            }
        }

        public function alterar($carro = array()){
            $urlAPI = "http://localhost:8080/rest/carros";
            $ch = curl_init($urlAPI);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $carro);
            curl_exec($ch);
            curl_close($ch);
        }

        public function deletar($id){
            $urlAPI = "http://localhost:8080/rest/carros/" . (string) $id;
            $ch = curl_init($urlAPI);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
            curl_exec($ch);
            curl_close($ch);
        }
	}
	
	$metodos = new metodos;
	
	if(!empty($_POST['placa'])){
		$metodos->salvar($_POST['placa']);
	}

	if(!empty($_POST['id_del'])){
		$metodos->deletar($_POST['id_del']);
	}

	if(!empty($_POST['id_alt']) && !empty($_POST['placa_alt'])){
		$metodos->alterar(['id'=>$_POST['id_alt'], 'placa' => $_POST['placa_alt']]);
	}
 ?>
<html>
	<head>
		<meta charset = UTF-8/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
	
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class = "card" style = "margin: 10px">
			<div class = "card-header">
				<h1 class = "card-title">Lista de Carros Cadastrados</h1>
			</div>
			
			<div class="card-body">
				<form class="form-inline" method="POST" style="margin: 20px 0">
					<div class="form-group">
						
						<input type="text" class="form-control" placeholder="Placa" required="required" name="placa"/>
						&nbsp;
						<button type="submit" class="btn btn-primary">
							Salvar
						</button>
					
					</div>
				</form>
				
				<table class = "table">
					<thead>
						<tr>
							<th>#</th>
							<th>Placa</th>
							<th>Editar</th>
							<th>Excluir</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$dados = $metodos->listarTodos();
						foreach($dados as $carro):
					?>

					<tr>
                        <td> <?php echo $carro->id ?> </td>
                        <td> <?php echo $carro->placa ?> </td>
                        <td> 
							<form class="form-inline" method="POST" action="editar.php">
								<input type="hidden" name="id" class="form-control" value="<?php echo $carro->id; ?>"/>
								<input type="hidden" name="placa" class="form-control" value="<?php echo $carro->placa; ?>"/>
								<button type="submit"
									class="btn btn-primary">Editar
								</button>
							</form>
					    </td>
						<td>
							<form class="form-inline" method="POST">
								<input type="hidden" class="form-control" name="id_del" value="<?php echo $carro->id ?>"/>
								&nbsp;
								<button type="submit"
									class="btn btn-danger">Excluir
								</button>
							</form>
						</td>
                    </tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>
