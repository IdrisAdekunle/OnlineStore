@extends('frontend.layouts.app')


@section('content')

    <div class="container">

        <div class="col-md-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a>
                </li>
                <li>My addresses</li>
            </ul>

        </div>

        <div class="col-md-3">
            <!-- *** CUSTOMER MENU ***
_________________________________________________________ -->
        @include('frontend.layouts.side')
        <!-- /.col-md-3 -->

            <!-- *** CUSTOMER MENU END *** -->
        </div>

        <div class="col-md-9">
            <div class="box">
                <h1>Create new Address</h1>


                <h3>Address details</h3>

                <form action="{{route('address.index')}}"  method="post">



                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" name="fname">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" name="lname" >
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="street">Street</label>
                                <input type="text" class="form-control" name="street" >
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">

                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="control-label">State</label>
                                <select name="state" id="state" class="form-control">
                                    <option value="" selected="selected" >- Select -</option>
                                    <option value='Abia'>Abia</option>
                                    <option value='Adamawa'>Adamawa</option>
                                    <option value='AkwaIbom'>AkwaIbom</option>
                                    <option value='Anambra'>Anambra</option>
                                    <option value='Bauchi'>Bauchi</option>
                                    <option value='Bayelsa'>Bayelsa</option>
                                    <option value='Benue'>Benue</option>
                                    <option value='Borno'>Borno</option>
                                    <option value='Cross River'>Cross River</option>
                                    <option value='Delta'>Delta</option>
                                    <option value='Ebonyi'>Ebonyi</option>
                                    <option value='Edo'>Edo</option>
                                    <option value='Ekiti'>Ekiti</option>
                                    <option value='Enugu'>Enugu</option>
                                    <option value='FCT'>FCT</option>
                                    <option value='Gombe'>Gombe</option>
                                    <option value='Imo'>Imo</option>
                                    <option value='Jigawa'>Jigawa</option>
                                    <option value='Kaduna'>Kaduna</option>
                                    <option value='Kano'>Kano</option>
                                    <option value='Katsina'>Katsina</option>
                                    <option value='Kebbi'>Kebbi</option>
                                    <option value='Kogi'>Kogi</option>
                                    <option value='Kwara'>Kwara</option>
                                    <option value='Lagos'>Lagos</option>
                                    <option value='Nasarawa'>Nasarawa</option>
                                    <option value='Niger'>Niger</option>
                                    <option value='Ogun'>Ogun</option>
                                    <option value='Ondo'>Ondo</option>
                                    <option value='Osun'>Osun</option>
                                    <option value='Oyo'>Oyo</option>
                                    <option value='Plateau'>Plateau</option>
                                    <option value='Rivers'>Rivers</option>
                                    <option value='Sokoto'>Sokoto</option>
                                    <option value='Taraba'>Taraba</option>
                                    <option value='Yobe'>Yobe</option>
                                    <option value='Zamfara'>Zamafara</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="control-label">Lga</label>
                                <select name="city" id="lga" class="form-control" required>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="phone">Telephone</label>
                                <input type="text" class="form-control" name="phone" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="Shipping/Billing Address">Shipping/Billing Address</label>
                                <input type="checkbox" name="default" >
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Save changes</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>




@endsection
