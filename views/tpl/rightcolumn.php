<div>
	<p>
		<h2>Top users</h2>
   <?php

    foreach ($top as $key => $value) :
    ?>
      <table class="top" id="top">
        <tr>
          <td><?php echo $value. " --- " . $key . " points" . '</br>';?> </td>
        </tr>
      </table>
    <?php
    endforeach;
    ?>

	</p>
</div>