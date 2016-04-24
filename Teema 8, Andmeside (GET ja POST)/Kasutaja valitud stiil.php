<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8" />
      <title> Vali stiil </title>
      <style>
      hr{
        display: flex;
        margin-top: 5px;
        margin-bottom: 5px;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 1px;
      }
        #kuva{
          background-color: <?php if(isset($_GET['taustaVarv'])){
            $taustaVarv=htmlspecialchars($_GET['taustaVarv']);
            echo "${_GET["taustaVarv"]}";
          } ?>;
          color:  <?php if(isset($_GET['tekstiVarvus'])){
            $tekstiVarv=htmlspecialchars($_GET['tekstiVarvus']);
            echo "${_GET["tekstiVarvus"]}";
          } ?>;
          border-style:  <?php if(isset($_GET['piirjooneTyyp'])){
            $piirjooneTyyp=htmlspecialchars($_GET['piirjooneTyyp']);
            echo "${_GET["piirjooneTyyp"]}";
          } ?>;
          border-color:   <?php if(isset($_GET['piirjooneVarvus'])){
            $piirjooneVarvys=htmlspecialchars($_GET['piirjooneVarvus']);
            echo "${_GET["piirjooneVarvus"]}";
          } ?>;
          border-width: <?php if(isset($_GET['laius'])){
            $laius=htmlspecialchars($_GET['laius']);
            echo "${_GET["laius"]}"."px";
          } ?>;
          border-radius: <?php if(isset($_GET['raadius'])){
            $raadius=htmlspecialchars($_GET['raadius']);
            echo "${_GET["raadius"]}"."px";
          } ?>;
          font-size: <?php if(isset($_GET['suurus'])){
            $suurus=htmlspecialchars($_GET['suurus']);
            echo "${_GET["suurus"]}"."px";
          } ?>;
          padding: 10px;
          max-width: 400px;
        }
        body{
          font-family: "Times New Roman", Times, serif;
          padding-left: 0px;
          padding-top: 0px;
        }
        fieldset{
          max-width: 200px;
		  max-width: 400px;
          border-radius: 5px;
        }
      </style>
  </head>
  <body>
    <div id="kuva"><?php if(isset($_GET['tekst'])){
      $tekst=htmlspecialchars($_GET['tekst']);
      echo "${_GET["tekst"]}";
    } ?>

    </div>
      <hr>
      <form method="get" action="Kasutaja valitud stiil.php">

        <textarea rows="5" cols="50" name="tekst" id="sisestatudTekst"> </textarea>
          <br>

          <input type="number" min="1" max="25" name="suurus"> Teksti suurus (1-25px)</input>
          <br>

        <input type="color" name="taustaVarv" value="#000000"> Taustavärvus</input>
          <br>

        <input type="color" name="tekstiVarvus" value="#0078ff"> Tekstivärvus</input>
          <br>
          <br>
          <fieldset>
            <legend>Piirjoon</legend>
            Piirjoone laius (0-20px): <input type="number" min="0" max="20" step="1" name="laius">
            <br>

            Piirjoonetüüp: <select name="piirjooneTyyp">
              <option value="none"> Piirjoon puudub </option>
              <option value="dotted"> Punktiline piirjoon </option>
              <option value="solid"> Ühtlane piirjoon </option>
              <option value="double"> Topelt piirjoon</option>
              <option value="outset"> 3D </option>
            </select>
            <br>

            Piirjoone värvus: <input type="color" name="piirjooneVarvus" value="#008000">
            <br>
            Piirjoone nurga raadius (0-100px): <input type="number" min="0" max="100" name="raadius">
          </fieldset>
          <br>
        <button type="submit" name="esita"> Esita</button>
      </form>
  </body>
</html>