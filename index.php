<!DOCTYPE html>
<?php
    include_once "carsdata.php";
    $data = new CarsData();
    if(!isset($_GET['cars'])){
        $_GET['cars'] = 'all';
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        Mr. Wheely - Autobedrijf
    </header>
    <main>
        <form method="get" action="index.php">
            <label>Merk
                <select name="cars">
                    <option value="all" <?php if(isset($_GET['cars'])) if($_GET['cars']=="all") echo "selected" ?>>Alle</option>
                    <option value="Volvo" <?php if(isset($_GET['cars'])) if($_GET['cars']=="Volvo") echo "selected" ?>>Volvo</option>
                    <option value="Saab" <?php if(isset($_GET['cars'])) if($_GET['cars']=="Saab") echo "selected" ?>>Saab</option>
                    <option value="Fiat" <?php if(isset($_GET['cars'])) if($_GET['cars']=="Fiat") echo "selected" ?>>Fiat</option>
                    <option value="Audi" <?php if(isset($_GET['cars'])) if($_GET['cars']=="Audi") echo "selected" ?>>Audi</option>
                    <option value="BMW" <?php if(isset($_GET['cars'])) if($_GET['cars']=="BMW") echo "selected" ?>>BMW</option>
                    <option value="Porsche" <?php if(isset($_GET['cars'])) if($_GET['cars']=="Porsche") echo "selected" ?>>Porsche</option>
                    <option value="Mazda" <?php if(isset($_GET['cars'])) if($_GET['cars']=="Mazda") echo "selected" ?>>Mazda</option>
                    <option value="Daewoo" <?php if(isset($_GET['cars'])) if($_GET['cars']=="Daewoo") echo "selected" ?>>Daewoo</option>
                </select>
            </label>
            <label>Maximale prijs
                <input type="number" name="maxprice" value="<?php if(isset($_GET['maxprice'])) echo $_GET['maxprice']; else echo "0" ?>" min="0" max="<?php $data->getMaxPrice()?>" required>
            </label>
            <label>Minimale prijs
                <input type="number" name="minprice" value="<?php if(isset($_GET['minprice'])) echo $_GET['minprice']; else echo "0" ?>" min="0" max="<?php $data->getMaxPrice()?>" required>
            </label>
            <input type="submit" name="submit" value="submit">
        </form>
    </main>
    <div id="display">
        <?php
            if(isset($_GET['submit'])){
                if($_GET['cars'] != 'all'){
                    if($_GET['maxprice'] > 0 || $_GET['minprice'] > 0) $cars = $data->getCarsByPriceAndName($_GET['minprice'], $_GET['maxprice'], $_GET['cars']);
                    else $cars = $data->getCarsByName($_GET['cars']);
                    foreach($cars as $c){
                        $data->getFormatedCard($c);
                    }

                }
                else{
                    if($_GET['maxprice'] > 0 || $_GET['minprice'] > 0) $cars = $data->getCarsByPrice($_GET['minprice'], $_GET['maxprice']);
                    else $cars = $data->getAllCars();
                    foreach($cars as $c){
                        $data->getFormatedCard($c);
                    }

                }
            }
            else if(!isset($_GET['submit'])){
                $cars = $data->getAllCars();
                foreach($cars as $c){
                    $data->getFormatedCard($c);
                }
            }
        ?>
    </div>
</body>
</html>