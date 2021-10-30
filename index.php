<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Resize</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>

<body>

    <div class="row">
        <div class="page-container row-12">
            <div class="wrap">
                <h2 class="col-12 text-center mb-5">Choose Image size</h2>
                <div class="row-8 form-container">
                    <form action="features.php" method="post">
                        <div class="row">
                            <div class="col-12">

                                <label for="width">Width</label>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" value="600" name="width" id="width" placeholder="width" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="typeWi" id="" class="form-control">
                                        <option value="pixels" selected>pixels</option>
                                        <option value="inches">inches</option>
                                        <option value="mm">mm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-12">

<label for="height">Height</label>
</div>
                            <div class="col-6">
                                <div class="form-group">
                                    <!-- <label for=""></label> -->
                                    <input type="text" value="600" name="height" id="height" placeholder="height" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="typeHe" id="" class="form-control">
                                        <option value="pixels" selected>pixels</option>
                                        <option value="inches">inches</option>
                                        <option value="mm">mm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-12">

<label for="res">Resolution</label>
</div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="res" placeholder="dpi/ppi" value="200" id="res">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="typeRes" id="" class="form-control">
                                        <option value="dpi" selected>dpi</option>
                                        <option value="ppi">ppi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <input class="form-control btn btn-success" type="submit" name="features" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>