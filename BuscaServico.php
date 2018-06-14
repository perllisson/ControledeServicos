<?php
     require_once('Model\Servico.php');
?>
<HTML>
<HEAD>
 <TITLE>Serviços</TITLE>
 </HEAD>
<BODY>
      <center>
        <h1>Visualização de serviços</h1>
      <p>
<?php
      session_start();
      
      $servicos = $_SESSION['servicos'];
      $datas = $_SESSION['datas'];
      function formatarData($data)
      {
        return date('d/m/Y',$data);
      }
?>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>NOME</th>
      <th>TIPO</th>
      <th>VALOR</th>
      <th>DATAS DISPONIVEIS</th>
    </tr>


<?php
          foreach($servicos as $servico)
          {
?>
              <tr align='center'>
                <td><?=$servico->id; ?></td>
                <td><?=$servico->nome; ?></td>
                <td><?=$servico->tipo; ?></td>
                <td><?=$servico->valor; ?></td>
                <td>
                <select>
                <?php
                
                  foreach($datas as $data)
                {
                if ($servico->id == $data->id) {
                  echo "<option value=$data->id>";
                  echo formatarData(strtotime($data->data));
                echo "</option>";
                }
                }
                ?>
                </select>
                </td>
              </tr>
          <?php
          }
          ?>
               </table>
            </BODY>
</HTML>