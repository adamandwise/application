<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/application-styles.css">
    <title>Application Page</title>
</head>
<body class="background2">
<div class="container background2">
    <br>
    <div class="row background1">


            <br>
        <br>
            <h1>Junior Software Development Engineer in Test</h1>
            <h3>For Hot Tub Time Machines</h3>
            <form action="submit.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input name="email" type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input name="dob" type="date" class="form-control" id="dob">
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input name="address" type="text" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input name="city" type="text" class="form-control" id="city">
                </div>
                <div class="form-group">
                    <label for="state">State:</label>
                    <input name="state" type="text" class="form-control" id="state">
                </div>
                <div class="form-group">
                    <label for="zip">Zip Code:</label>
                    <input name="zip" type="text" class="form-control" id="zip">
                </div>
                <div class="form-group">
                    <label for="sex">Sex:</label>
                    <select name="sex" class="form-control" id="sex">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="resume">Upload Resume:</label>
                    <input name="resume" type="file" class="form-control-file" id="resume">
                </div>
                <div class="form-group">
                    <label for="coverLetter">Cover Letter:</label>
                    <textarea name="coverLetter" class="form-control" id="coverLetter" rows="5"></textarea>
                    <button type="submit" class="btn btn-primary ">Submit</button>
                </div>

            </form>
        </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
