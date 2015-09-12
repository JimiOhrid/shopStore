@extends('ecomm.shop.store')

@section('categories')
    @include('ecomm.shop.partial.categories')
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading panel-title"><span class="fa fa-user-plus"></span> Registration
                    </div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Oops!</strong> There was a problem with your registry.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br>

                        <form class="form form-horizontal" role="form" data-toggle="validator" method="POST"
                              action="{{ url('/auth/register') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                           data-error="The name is required" required>

                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">E-Mail</label>

                                <div class="col-md-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                               data-error="The e-mail is required" required>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Password</label>

                                <div class="col-md-7">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                                        <input type="password" class="form-control" name="password"
                                               data-error="The password is required" required>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Confirm Password</label>

                                <div class="col-md-7">
                                    <div class="input-group">
                                        <span class="input-group-addon">&nbsp<i class="fa fa-unlock-alt"></i></span>
                                        <input type="password" class="form-control" name="password_confirmation"
                                               data-error="The password confirmation is required" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-8 control-label sub-title">Details for Delivery</label>

                                <div class="col-md-2">
                                    <div class="clearfix"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Address</label>

                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                           data-error="The address is required" required>

                                    <div class="help-block with-errors"></div>
                                </div>


                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Number</label>

                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="number" value="{{ old('number') }}"
                                           required>
                                </div>

                                <label class="col-md-1 control-label">Area</label>

                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="neigbh" value="{{ old('neigbh') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">City</label>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}"
                                           required>
                                </div>

                                <label class="col-md-1 control-label">CC</label>

                                <div class="form-group col-md-2">
                                    <select name="state" class="form-control combobox" required>
                                        <option></option>
                                        <option value="AL">AL</option>
                                        <option value="DE">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="MA">MK</option>
                                        <option value="MK">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">ZIP Code</label>

                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="zip" value="{{ old('zip') }}"
                                           required>
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Telephone</label>

                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <button type="submit" class="btn btn-primary form-control">
                                        <span class="fa fa-user-plus"></span> register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $('.form').validator({
                html: true,
                disable: false
            });

            $('.combobox').val('{{ old('state') }}');
        });
    </script>
@endsection
