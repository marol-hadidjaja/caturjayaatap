<?php
  echo validation_errors();

  echo form_open_multipart("admin/products/update");

  $this->load->view('admin/products/_form');

  echo form_close();
?>

<div class="col l10 m9 right">
  <div class="sideRight detPage">
    <div class="title">
      <h5>Product (Name current)</h5>
      <a href="pages.html" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>Back to Product</a>
    </div>
    <form class="editPage">
      <div class="row">
        <div class="input-field col s12">
          <input id="name" type="text" class="validate" value="Kanal C-75">
          <label for="name">Name:</label>
        </div>
        <div class="col s12">
          <label>Category:</label>
          <div>search</div>
        </div>
        <div class="input-field col s12">
          <textarea placeholder="Product Description" id="desc" type="text" class="materialize-textarea"></textarea>
          <label for="desc">Description:</label>
        </div>

        <form action="#">
          <div class="file-field input-field">
            <div class="btn">
              <span>File</span>
              <input type="file" multiple>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload one or more files">
            </div>
          </div>
        </form>

        <div class="detProd">
          <section>
            <h5>Detail Product</h5>
          </section>

          <div class="detPrice">
            <div class="addPrice">
              <a class="waves-effect waves-light btn"><i class="material-icons">add</i></a>
              <span>Add Price</span>
            </div>
            <div class="secPrice">
              <div class="title">
                <h5>Price 1</h5>
                <a class="waves-effect waves-light btn red"><i class="material-icons">delete_forever</i></a>
              </div>
              <div class="content">
                <form>
                  <div class="row">
                    <div class="input-field col s6">
                      <input id="price" type="text" class="validate" value="68000">
                      <label for="price">Price:</label>
                    </div>
                    <div class="input-field col s6">
                      <select>
                        <option value="" disabled selected>Choose your Type</option>
                        <option value="1">Lembar</option>
                        <option value="2">Unit</option>
                        <option value="3">Batang</option>
                      </select>
                      <label>Type:</label>
                    </div>
                  </div>
                </form>
                <form>
                  <div class="row">
                    <div class="addSpec col s12">
                      <a class="waves-effect waves-light btn"><i class="material-icons">add</i></a>
                      <span>Add Specification</span>
                    </div>
                    <div class="spec">
                      <div class="input-field col s2">
                        <h5>Spec 1:</h5>
                      </div>
                      <div class="input-field col s3">
                        <select>
                          <option value="" disabled selected>Choose your Spec</option>
                          <option value="1">Panjang</option>
                          <option value="2">Lebar</option>
                          <option value="3">Tebal</option>
                          <option value="4">Tinggi</option>
                        </select>
                        <label>Spec:</label>
                      </div>
                      <div class="input-field col s3">
                        <input id="spec1" type="text" value="6">
                        <label for="spec1">Size:</label>
                      </div>
                      <div class="input-field col s3">
                        <select>
                          <option value="" disabled selected>Choose your Size</option>
                          <option value="1">Inchi - in</option>
                          <option value="2">Meter - m</option>
                          <option value="3">Centimeter - cm</option>
                          <option value="4">Milimeter - mm</option>
                        </select>
                        <label>Spec:</label>
                      </div>
                      <div class="input-field col s1 delSpec">
                        <a class="waves-effect waves-light btn red"><i class="material-icons">delete_forever</i></a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div><!-- detPrice -->
        </div><!-- detProd -->
      </div>
    </form>
    <div class="actionBtn">
      <a class="waves-effect waves-light btn">Save</a>
      <a class="waves-effect waves-light btn grey">Cancel</a>
    </div>
  </div>
</div>
