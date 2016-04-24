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
          background-color: <?php if(isset($_POST['taustaVarv'])){
            $taustaVarv=htmlspecialchars($_POST['taustaVarv']);
            echo "${_POST["taustaVarv"]}";
          } ?>;
          color:  <?php if(isset($_POST['tekstiVarvus'])){
            $tekstiVarv=htmlspecialchars($_POST['tekstiVarvus']);
            echo "${_POST["tekstiVarvus"]}";
          } ?>;
          border-style:  <?php if(isset($_POST['piirjooneTyyp'])){
            $piirjooneTyyp=htmlspecialchars($_POST['piirjooneTyyp']);
            echo "${_POST["piirjooneTyyp"]}";
          } ?>;
          border-color:   <?php if(isset($_POST['piirjooneVarvus'])){
            $piirjooneVarvys=htmlspecialchars($_POST['piirjooneVarvus']);
            echo "${_POST["piirjooneVarvus"]}";
          } ?>;
          border-width: <?php if(isset($_POST['laius'])){
            $laius=htmlspecialchars($_POST['laius']);
            echo "${_POST["laius"]}"."px";
          } ?>;
          border-radius: <?php if(isset($_POST['raadius'])){
            $raadius=htmlspecialchars($_POST['raadius']);
            echo "${_POST["raadius"]}"."px";
          } ?>;
          font-size: <?php if(isset($_POST['suurus'])){
            $suurus=htmlspecialchars($_POST['suurus']);
            echo "${_POST["suurus"]}"."px";
          }?>;
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
    <div id="kuva"><?php if(isset($_POST['tekst'])){
      $tekst=htmlspecialchars($_POST['tekst']);
      echo "${_POST["tekst"]}";
    } ?>

    </div>
      <hr>
      <form method="post" action="Kasutaja valitud stiil.php">

        <textarea rows="5" cols="50" name="tekst" id="sisestatudTekst"><?php if(!empty($_POST["tekst"])) echo htmlspecialchars($_POST["tekst"]); ?></textarea>
          <br>

          <input type="number" min="1" max="25" name="suurus" <?php if(!empty($_POST["suurus"])) echo "value=\"".htmlspecialchars($_POST["suurus"])."\""; ?>> Teksti suurus (1-25px)</input>
          <br>

        <input type="color" name="taustaVarv" <?php if(!empty($_POST["taustaVarv"])) echo "value=\"".htmlspecialchars($_POST["taustaVarv"])."\""; ?>> Taustavärvus</input>
          <br>

        <input type="color" name="tekstiVarvus" <?php if(!empty($_POST["tekstiVarvus"])) echo "value=\"".htmlspecialchars($_POST["tekstiVarvus"])."\""; ?>> Tekstivärvus</input>
          <br>
          <br>
          <fieldset>
            <legend>Piirjoon</legend>
            Piirjoone laius (0-20px): <input type="number" min="0" max="20" step="1" name="laius" <?php if(!empty($_POST["laius"])) echo "value=\"".htmlspecialchars($_POST["laius"])."\""; ?>>
            <br>

            Piirjoonetüüp: <select name="piirjooneTyyp">
              <option value ="none" <?php if(!empty($_POST["piirjooneTyyp"]) && $_POST["piirjooneTyyp"] == "none") echo "selected"; ?>> Piirjoon puudub </option>
              <option value= "dotted" <?php if(!empty($_POST["piirjooneTyyp"]) && $_POST["piirjooneTyyp"] == "dotted") echo "selected"; ?>> Punktiline piirjoon </option>
              <option value="solid" <?php if(!empty($_POST["piirjooneTyyp"]) && $_POST["piirjooneTyyp"] == "solid") echo "selected"; ?>> Ühtlane piirjoon </option>
              <option value="double" <?php if(!empty($_POST["piirjooneTyyp"]) && $_POST["piirjooneTyyp"] == "double") echo "selected"; ?>> Topelt piirjoon</option>
              <option value="outset" <?php if(!empty($_POST["piirjooneTyyp"]) && $_POST["piirjooneTyyp"] == "outset") echo "selected"; ?>> 3D </option>
            </select>
            <br>

            Piirjoone värvus: <input type="color" name="piirjooneVarvus" <?php if(!empty($_POST["piirjooneVarvus"])) echo "value=\"".htmlspecialchars($_POST["piirjooneVarvus"])."\""; ?>>
            <br>
            Piirjoone nurga raadius (0-100px): <input type="number" min="0" max="100" name="raadius" <?php if(!empty($_POST["raadius"])) echo "value=\"".htmlspecialchars($_POST["raadius"])."\""; ?>>
          </fieldset>
          <br>
        <button type="submit" name="esita"> Esita</button>
      </form>
  </body>
</html>