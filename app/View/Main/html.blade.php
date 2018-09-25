<html>

    @include("Main.head", ["debugbarHead" => $debugbarHead ] )
    @include("Main.body", ["debugbarBody" => $debugbarBody, "customer" => $customer ] )
</html>