<h3>Yatzy-protokoll</h3>
<table>
  <tr>
<<<<<<< HEAD
    <th></th>
=======
    <th>Deltagare</th>
>>>>>>> refs/remotes/origin/main
    <th>Spelare</th> 
  </tr>
  <tr>
    <td>Ettor</td>
    <td><?= $_SESSION['saveDice'][0] ?></td>
  </tr>
  <tr>
    <td>Tvåor</td>
    <td><?= $_SESSION['saveDice'][1] ?></td>
  </tr>
  <tr>
    <td>Treor</td>
    <td><?= $_SESSION['saveDice'][2] ?></td>
  </tr>
  <tr>
    <td>Fyror</td>
    <td><?= $_SESSION['saveDice'][3] ?></td>
  </tr>
  <tr>
    <td>Femmor</td>
    <td><?= $_SESSION['saveDice'][4] ?></td>
  </tr>
  <tr>
    <td>Sexor</td>
    <td><?= $_SESSION['saveDice'][5] ?></td>
  </tr>
  <tr>
    <td><b>Summa </b></td>
    <td><?= $_SESSION["finale"] ?></td>
  </tr>

  <tr>
    <td><b>Bonus </b></td>
    <td><?= $_SESSION["bonus"] ?></td>
  </tr>

</table>