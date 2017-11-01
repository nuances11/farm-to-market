<?php include 'includes/header.php' ?>
<div class="page-container">
    <div class="page-header clearfix">
        <div class="pull-left">
            <h4 class="mt-0 mb-5">Edit Profile</h4>
            <ol class="breadcrumb mb-0">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li class="active">Edit Profile</li>
            </ol>
        </div>
    </div>
    <div class="page-content container-fluid">
        <div class="widget">
            <div class="widget-heading">
                <h3 class="widget-title">Horizontal Form</h3>
            </div>
            <div class="widget-body">
                <form id="form-horizontal" method="post" novalidate="novalidate" class="form-horizontal">
                    <div class="form-group">
                        <label for="fulImageHor" class="col-sm-2 control-label">Image upload</label>
                        <div class="col-sm-10">
                            <input id="fulImageHor" type="file" name="fulImageHor" data-buttontext="Choose file" data-buttonname="btn-outline btn-primary"
                                data-iconname="ti-image" data-rule-required="true" data-rule-accept="image/*" class="filestyle">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtEmailHor" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input id="txtEmailHor" type="text" name="txtEmailHor" placeholder="Enter email" data-rule-required="true" data-rule-rangelength="[10,30]"
                                data-rule-email="true" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtPasswordHor" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input id="txtPasswordHor" type="password" name="txtPasswordHor" placeholder="Enter password" data-rule-required="true" data-rule-rangelength="[10,30]"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtConfirmPasswordHor" class="col-sm-2 control-label">Confirm password</label>
                        <div class="col-sm-10">
                            <input id="txtConfirmPasswordHor" type="password" name="txtConfirmPasswordHor" placeholder="Enter confirm password" data-rule-required="true"
                                data-rule-equalto="#txtPasswordHor" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtDatePickerHor" class="col-sm-2 control-label">Date picker</label>
                        <div class="col-sm-10">
                            <div data-format="MM/DD/YYYY" class="input-group">
                                <input id="txtDatePickerHor" type="text" name="txtDatePickerHor" placeholder="Enter date" data-rule-required="true" data-rule-minlength="8"
                                    data-rule-date="true" class="form-control">
                                <span class="input-group-addon">
                                    <i class="ti-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtWebsiteHor" class="col-sm-2 control-label">Website</label>
                        <div class="col-sm-10">
                            <input id="txtWebsiteHor" type="text" name="txtWebsiteHor" placeholder="Enter website" data-rule-required="true" data-rule-url="true"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtCreditCardHor" class="col-sm-2 control-label">Credit card</label>
                        <div class="col-sm-10">
                            <input id="txtCreditCardHor" type="text" name="txtCreditCardHor" placeholder="Enter credit card" data-rule-required="true"
                                data-rule-creditcard="true" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtDecimalNumberHor" class="col-sm-2 control-label">Decimal number</label>
                        <div class="col-sm-10">
                            <input id="txtDecimalNumberHor" type="text" name="txtDecimalNumberHor" placeholder="Enter decimal number" data-rule-required="true"
                                data-rule-number="true" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtDigitsHor" class="col-sm-2 control-label">Digits</label>
                        <div class="col-sm-10">
                            <input id="txtDigitsHor" type="text" name="txtDigitsHor" placeholder="Enter digits" data-rule-required="true" data-rule-digits="true"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtPhoneUSHor" class="col-sm-2 control-label">Phone US</label>
                        <div class="col-sm-10">
                            <input id="txtPhoneUSHor" type="text" name="txtPhoneUSHor" placeholder="Enter phone US" data-rule-required="true" data-rule-phoneus="true"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ddlCountryHor" class="col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                            <select id="ddlCountryHor" name="ddlCountryHor" data-rule-required="true" class="form-control">
                                <option value="">-- Select a country --</option>
                                <option value="US">United States</option>
                                <option value="BG">Bulgaria</option>
                                <option value="BR">Brazil</option>
                                <option value="CN">China</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="DK">Denmark</option>
                                <option value="FR">France</option>
                                <option value="DE">Germany</option>
                                <option value="IN">India</option>
                                <option value="MA">Morocco</option>
                                <option value="NL">Netherlands</option>
                                <option value="PK">Pakistan</option>
                                <option value="RO">Romania</option>
                                <option value="RU">Russia</option>
                                <option value="SK">Slovakia</option>
                                <option value="ES">Spain</option>
                                <option value="TH">Thailand</option>
                                <option value="AE">United Arab Emirates</option>
                                <option value="GB">United Kingdom</option>
                                <option value="VE">Venezuela</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdbGenderHor" value="male" data-rule-required="true"> Male
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="rdbGenderHor" value="female"> Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="btnSubmit" class="btn btn-raised btn-black">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php' ?>