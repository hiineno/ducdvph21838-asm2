
<script>
        function validate(){
            var name = document.getElementById("name").value;
            var price = document.getElementById("price").value;
            var soluong = document.getElementById("soluong").value;
            var description = document.getElementById("description").value;

            if(name == ""){
                document.getElementById("loiname").innerHTML =" Không được để trống ";
                return false;
            }
            else document.getElementById("loiname").innerHTML = "";
            if(price == ""){
                document.getElementById("loiprice").innerHTML = "Không được để trống";
                return false;
            }
            else document.getElementById("loiprice").innerHTML ="";
            if(soluong == ""){
                document.getElementById("loisoluong").innerHTML = " Không được để trống ";
                return false;
            }
            else document.getElementById("loisoluong").innerHTML ="";
            if(description == ""){
                document.getElementById("loides").innerHTML =" Không được để trống";
                return false;
            }
            else document.getElementById("loides").innerHTML ="";
            return true;
        }
    
</script>
<main>
    <link rel="stylesheet" href="./src/css/kkk.css">
    <h1>Add Product</h1>
 
    <div class="add_product">

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="text" hidden name="product_id" value="<?= $product->product_id ?>">
            <label for="">Product Name</label> <br>
            <input type="text" id="name" value="<?= $product->product_name ?>" name="product_name" >
            <p id="loiname" style="color: red"></p>
            <br>
            
            <label for=""> Image:</label> <br>
            <input type="file" class="image" id="image" name="product_avatar" multiple>
            <p id="loiname" style="color: red"></p>
            <br>
           

            <label for="">Price:</label> <br>
            <input type="number" value="<?= $product->product_price ?>" name="product_price" id="price">
            <p id="loiprice" style="color: red"></p>
            <br>
            <label for="">Số lượng</label><br>
            <input type="number" value="<?= $product->product_quantity ?>" name="product_quantity" id="soluong">
            <p id="loisoluong" style="color: red"></p>

            <br>
            <label for="">Categorie</label> <br>
            <select class="form-select" aria-label="Default select example" name="type_id">
            <p id="loiname" style="color: red"></p>
            <?php
             
                 foreach ($categories as $cate) {
                 ?>
                    <option value="<?= $cate->type_id ?>"> <?= $cate->type_name?> </option>
                <?php
                }
                ?>
            </select>
            <br>
            
            <label for="">Desciption:</label> <br>
            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="product_desc"><?= $product->product_desc ?></textarea>
            <p id="loides" style="color: red"></p>
            <br>
                
          
          
            <br>

            <button onclick="return validate()" type="submit" class="btn" style="margin-top:20px ;" >Sửa</button>

                

        </form>

    </div>

</main>
