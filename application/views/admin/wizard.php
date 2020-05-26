<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="container">
                <br />
                <form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">

                    <!-- SmartWizard html -->
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Email Address</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Name</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Address</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>Terms and Conditions</small></a></li>
                        </ul>

                        <div>
                            <div id="step-1">
                                <h2>Your Email Address</h2>
                                <div id="form-step-0" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Write your email address" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                            <div id="step-2">
                                <h2>Your Name</h2>
                                <div id="form-step-1" role="form" data-toggle="validator">
                                    <div class="container-fluid">
                                        <h4>Choose level want to show</h4>
                                        <div class="form-group">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio1" name="level" class="custom-control-input" value="Admin" required>
                                                <label class="custom-control-label" for="radio1">Admin</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio2" name="level" class="custom-control-input" value="Keuangan" required>
                                                <label class="custom-control-label" for="radio2">Keuangan</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio3" name="level" class="custom-control-input" value="Tour" required>
                                                <label class="custom-control-label" for="radio3">Tour</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="radio4" name="level" class="custom-control-input" value="Direktur" required>
                                                <label class="custom-control-label" for="radio4">Direktur</label>
                                            </div>
                                        </div>
                                        <hr class="divider">
                                        <div class="table-responsive">
                                            <table class="table" id="tableWizard" style="display: none">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Email</th>
                                                        <th>Alamat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3">
                                <h2>Your Address</h2>
                                <!-- <div id="form-step-2" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control" name="address" id="address" rows="3" placeholder="Write your address..." required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> -->
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <ul>
                                        <li class="btn btn-light active">
                                            <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                            <img src="https://www.gravatar.com/avatar/75550aaf5b7db5eba2283ac3171b05ea?s=256&d=identicon&r=PG&f=1" alt="" width="24" height="24" class="img-input">
                                        </li>
                                        <li class="btn btn-light">
                                            <input type="radio" name="options" id="option2" autocomplete="off">
                                            <img src="https://www.gravatar.com/avatar/75550aaf5b7db5ega2283ac3171b05ea?s=256&d=identicon&r=PG&f=1" alt="" width="24" height="24" class="img-input">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="step-4" class="">
                                <h2>Terms and Conditions</h2>
                                <p>
                                    Terms and conditions: Keep your smile :)
                                </p>
                                <div id="form-step-3" role="form" data-toggle="validator">
                                    <div class="form-group">
                                        <label for="terms">I agree with the T&C</label>
                                        <input type="checkbox" id="terms" data-error="Please accept the Terms and Conditions" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>