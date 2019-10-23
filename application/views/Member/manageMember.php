<?php ?>
<div class="row" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box">
            <div class="title-box-d">
                <h3 class="title-d">Manage Member</h3>
            </div>
            <div class="row">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Member Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact No</th>
                            <th scope="col">Status</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($Members)) {
                            $i = 0;
                            foreach ($Members as $Member) {
                                $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $Member['memberid']; ?></td>
                                    <td><?php echo $Member['memberName']; ?></td>
                                    <td><?php echo $Member['address']; ?></td>
                                    <td><?php echo $Member['contactNo']; ?></td>
                                    <td><?php
                                        if ($Member['status']) {
                                            echo "Active";
                                        } else {
                                            echo "Not active";
                                        }
                                        ?></td>
                                    <td style="text-align: center  "><a  data-toggle="modal" data-target="#myModal" style="padding: 5px;" onclick="edit('<?php echo $Member['memberid']; ?>')"><span style= "color:#2eca6a;" class="fa fa-pencil"></span></a><a  onclick="deleteMember('<?php echo $Member['memberid']; ?>')" style="padding: 5px;" ><span style= "color:#2eca6a;" class="fa fa-trash"></span></a></td>
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

<div id="myModal" class="modal fade" role="dialog" >
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <div class="title-box-d">
                    <h3 class="title-d">Edit Member</h3>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="box form">
                    <form class="form-a" method="post" id="submit">
                        <div class="row">

                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="Type">Member/User Id</label>
                                    <input type="text"  disabled id="mid" required  name="mid" class="form-control form-control-lg form-control-a" placeholder="Name">

                                </div>
                                <div class="form-group">
                                    <label for="Type">Member/User Name</label>
                                    <input type="text" id="name" required  name="name" class="form-control form-control-lg form-control-a" placeholder="Name">

                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="city">Email</label>
                                    <input type="email" required id="email" name="email" class="form-control form-control-lg form-control-a" placeholder="Email">

                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="city">Address</label>
                                    <input type="text" required id="address" name="address" class="form-control form-control-lg form-control-a" placeholder="Address">

                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="Type">Type</label>
                                    <select required id="type" name="type" class="form-control form-control-lg form-control-a" >
                                      
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label for="Type">Contact No</label>
                                    <input required type="text" id="Contactno" name="Contactno" class="form-control form-control-lg form-control-a" placeholder="Contact No">

                                </div>
                            </div>

                            <div class="col-md-12">
                                <button type="submit"  class="btn btn-b">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
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
            url: '<?php echo base_url() ?>index.php/Member/getMember/' + id,
            type: 'post',
            success: function (data)
            {
                var obj = JSON.parse(data);
                document.getElementById('name').value = obj.name + "";
                document.getElementById('Contactno').value = obj.contactNo + "";
                document.getElementById('address').value = obj.address + "";
                document.getElementById('email').value = obj.email + "";
               //document.getElementById('type').value = obj.type + "";
                alert(obj.type);
                if (obj.type==1) {
                 
                    $('#type').append('<option value="member"> Member </option><option selected value="user"> User </option>');
                } else {
                    $('#type').append('<option selected value="member"> Member </option><option value="user"> User </option>');
                }
                
                document.getElementById('mid').value = id;


            }
        });
    }
    function deleteMember(id) {
        
        if (confirm("Do you want to delete ?")) {
           $.ajax({
            url: '<?php echo base_url() ?>index.php/Member/deleteMember/' + id,
            type: 'post',
            error: function (request, error) {
                console.log(request);
                alert(" Can't do because: " + error);
            },
            success: function (status, data)
            {

                console.log(status);
                console.log(data);
                alert("Delete Member Success..");
                location.reload();
            }
        });
        } else {
           location.reload();
        }
    }

    $('#submit').submit(function (e) {
        e.preventDefault();
        var id = document.getElementById('mid').value;
        $.ajax({
            url: '<?php echo base_url() ?>index.php/Member/updateMember/' + id,
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
                alert("Update Member Success..");
                location.reload();
            }
        });
    });
</script>
