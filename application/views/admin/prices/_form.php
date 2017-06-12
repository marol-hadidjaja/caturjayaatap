<div class="secPrice prices">
  <div class="title">
    <h5>Price <?= ($prices_count + 1) ?></h5>
    <a class="waves-effect waves-light btn red delete_price"><i class="material-icons">delete_forever</i></a>
  </div>

  <div class="content">
    <div class="row">
      <div class="input-field col s6">
        <?php
          if(isset($price)){
            $data = array('name' => "prices[{$prices_count}][id]",
              'type' => 'hidden',
              'class' => 'prices_id',
              'value' => isset($price) ? set_value('id', $price['price_id']) : set_value('price_id'));
            echo form_input($data);
          }

          $data = array('name' => "prices[{$prices_count}][price]",
            'type' => 'number',
            'class' => 'prices_price validate',
            'placeholder' => 'Price',
            'value' => isset($price) ? set_value('price', $price['price']) : set_value('price'));
          echo form_input($data);

          echo form_label('Price:', 'prices_price');
        ?>
      </div>

      <div class="input-field col s6">
        <?php
          $data = array('name' => "prices[{$prices_count}][per]",
            'class' => 'prices_per');

          if(isset($price))
            echo form_dropdown($data, $options_per, $price['per'], '0');
          else
            echo form_dropdown($data, $options_per, '0');

          echo form_label('Type:', 'prices_per');
        ?>
      </div>
    </div>

    <div class="row">
      <div class="addSpec col s12">
        <a class="waves-effect waves-light btn add_spec"><i class="material-icons">add</i></a>
        <span>Add Specification</span>
      </div>

      <?php
        // echo "price in prices/_form.php: <br/>";
        // print_r($price);
        // echo "<br/>";


        echo "<div class='specs_container'>";
        if(isset($price) && count($price['specifications']) > 0){
          // key in $prices is different from what I want
          // I want curent order but just reverse the keys
          $specs_count = count($price['specifications']) - 1;
          foreach($price['specifications'] as $specification){
            // echo "specification in prices/_form.php:";
            // print_r($specification);
            // echo "<br/>";
            $this->load->view('admin/specifications/_form', array('prices_count' => $prices_count,
              'specs_count' => $specs_count,
              'specification' => $specification));
            $specs_count --;
          }
        }
        echo "</div><!-- close .specs_container -->";
      ?>
    </div><!-- close .row -->
  </div><!-- close .content -->
</div><!-- close .secPrice.prices -->
