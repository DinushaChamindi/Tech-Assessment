<?php ?>
<div class="row" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="box">
            <div class="title-box-d">
                <h3 class="title-d">Manage Book</h3>
            </div>
            <div class="row">

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Issued Date</th>
                            <th scope="col">Book Id</th>
                            <th scope="col">Book</th>
                            <th scope="col">Member Id</th>
                            <th scope="col">Member Name</th>
                            <th scope="col">Return Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($IssuedBooks)) {
                            $i = 0;
                            foreach ($IssuedBooks as $IssuedBook) {
                                $i++;
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $IssuedBook['date']; ?></td>
                                    <td><?php echo $IssuedBook['bookId']; ?></td>
                                    <td><?php echo $IssuedBook['book']; ?></td>
                                    <td><?php echo $IssuedBook['memberId']; ?></td>
                                    <td><?php echo $IssuedBook['member']; ?></td>
                                    <td><?php echo $IssuedBook['returnDate']; ?></td>
                                    <td><?php
                                        if ($IssuedBook['isReturn']) {
                                            echo "Return";
                                        } else {
                                            echo "Not Return";
                                        }
                                        ?></td>
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

