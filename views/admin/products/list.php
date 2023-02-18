<style>
    .select_search{
        width: 200px;
        margin-top: 20px;
        margin-bottom: 0px;
        padding: 2px;
    }
    .timkiem{
        position: absolute;
        right: 390px;
        top: 83px;
       color: var(--color-info-dark);
    }
    .timkiem:hover{
        cursor: pointer;
    }
    .wrap_date_form{
        display: flex;
        justify-content: space-between;
        
    }
    
</style>

<main>
<script src="https://cdn.tailwindcss.com"></script>
    <h1 class="font-bold text-[30px]">Show Product</h1>
    <div class="wrap_date_form">
    
    <form action="" method="POST" class="form">
        
        
        <?php 
           
          ?>
     
        <select class="select_search" name="category_id" id="">
         <option  class="text-blue-500 text-[20px]"   value="0" selected>Tất cả thể loại</option>

       
        </select> </br>
       
       <button class="text-white mt-4 bg-blue-500 text-[15px]" name="btn_submit" type="submit">tìm kiếm</button>


    </form>
    </div>

    <div class="show_product">
        <div class="table_wrapper">
           
            <table class="table">
                <tr>
                    <th>Product_ID</th>
                    <th>Product_name</th>
                    <th>Ảnh</th>
                    <th>Type_ID</th>
                    <th>Price</th>>
                    <th>Số lượng</th>
                    <th>Desciption</th>
                    <!-- <th>Time</th> -->

                    <th width="150pxpx">
                        <a href="/create-product" class="btn-them" style="width:fit-content">Thêm Sản Phẩm</a>
                        
                    </th>

                </tr>


                <!-- Đổ dữ liệu -->
                
                <?php 
              
                foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product->product_id ?></td>
                        <td class="font-bold"><?= $product->product_name ?></td>
                        <td><img src="../src/imgs/img_product/<?= $product->product_avatar?>" alt="" width="50px"></td>
                       
                        <?php
                     
                        ?>
                        <td> <?= $product->type_id?> </td>

                       

                        <td style="text-decoration: ;" class="text-red-500"><?= $product->product_price ?>.Đ</td>

                       
                    
                        <td> <?php echo $product->product_quantity?> </td>

                        <td><?= substr($product->product_desc,0,77)  ?></td>
                        <!-- <td><?= $product->product_date?></td> -->
                        <td>
                            <a href="/update-product?id=<?= $product->product_id?>" class="btn-sua">Sửa</a>
                            <a href="/delete-product?id=<?= $product->product_id?>" class="btn-xoa" onclick="return confirm('Bạn có chắc xóa không?')">Xóa</a>
                        </td>

                    </tr>


                <?php endforeach ?>
            </table>
        </div>

    </div>





</main>