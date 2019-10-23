<?php ?>
<div class="row" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box">
            <div class="title-box-d">
                <h3 class="title-d">Manage Book</h3>
            </div>
            <div class="row">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Book Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Auther</th>
                            <th scope="col">Price</th>
                            <th scope="col">Availability</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($books)) {
                            $i = 0;
                            foreach ($books as $book) {
                                $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $book['bookId']; ?></td>
                                    <td><?php echo $book['bookName']; ?></td>
                                    <td><?php echo $book['auther']; ?></td>
                                    <td><?php echo $book['price']; ?></td>
                                    <td><?php
                                        if ($book['isAvailable']) {
                                            echo "Available";
                                        } else {
                                            echo "Not Available";
                                        }
                                        ?></td>
                                    <td style="text-align: center  "><a  data-toggle="modal" data-target="#myModal" style="padding: 5px;" onclick="edit('<?php echo $book['bookId']; ?>')"><span style= "color:#2eca6a;" class="fa fa-pencil"></span></a><a  onclick="deleteBook('<?php echo $book['bookId']; ?>')" style="padding: 5px;" ><span style= "color:#2eca6a;" class="fa fa-trash"></span></a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>


                    </tbody>
                </table>

            </div>
        </div>
    </div></div>

<div id="myModal" class="modal fade" role="dialog" style="margin-top:100px;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <div class="title-box-d">
                    <h3 class="title-d">Edit Book</h3>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form-a" method="post" id="submit">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Book Id</label>
                                <input  type="text" id="bid" name="bid" disabled class="form-control form-control-lg form-control-a" >

                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="Type">Book Name</label>
                                <input type="text" id="name" required  name="name" class="form-control form-control-lg form-control-a" placeholder="Book Name">

                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="city">Auther</label>
                                <input type="text" required id="auther" name="auther" class="form-control form-control-lg form-control-a" placeholder="Auther">

                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Category</label>
                                <select required id="Category" name="Category" class="form-control form-control-lg form-control-a" id="Type">
                                    <?php
                                    if (!empty($categories)) {
                                        foreach ($categories as $category) {
                                            ?>
                                            <option value="<?php echo $category['Id']; ?>"><?php echo $category['categoryName']; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>



                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Price</label>
                                <input required type="number" id="price" name="price" class="form-control form-control-lg form-control-a" placeholder="price">

                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <button type="submit"  class="btn btn-b">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
    function edit(id) {
       
        
        $.ajax({
            url: '<?php echo base_url() ?>index.php/Book/getBook/'+id,
            type: 'post',
            success: function (data)
            {
                var obj = JSON.parse(data);
                document.getElementById('name').value = obj.name+"";
                document.getElementById('auther').value = obj.auther+"";
                document.getElementById('Category').value = obj.category+"";
                document.getElementById('price').value = Number(obj.price);
                 document.getElementById('bid').value = id;
                

            }
        });
    }
    function deleteBook(id) {
         if (confirm("Do you want to delete ?")) {
           $.ajax({
            url: '<?php echo base_url() ?>index.php/Book/deleteBook/' + id,
            type: 'post',
            error: function (request, error) {
                console.log(request);
                alert(" Can't do because: " + error);
            },
            success: function (status, data)
            {

                console.log(status);
                console.log(data);
                alert("Delete Book Success..");
                location.reload();
            }
        });
        } else {
           location.reload();
        }
    }
    
    $('#submit').submit(function (e) {
        e.preventDefault();
       var id=document.getElementById('bid').value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/Book/updateBook/'+id,
            type: 'post',
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            error: function (request, error) {
                console.log(request);
                alert(" Can't do because: " + error);
            },
            success: function (status, data)
            {

                console.log(status);
                console.log(data);
                alert("Update Book Success..");
                location.reload();
            }
        });
    });
</script>