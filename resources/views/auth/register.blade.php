@extends('layouts.auth')

@section('addStyle')
    <style>
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>
@endsection

@section('content')
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="{{ route('login') }}"><img src="{{ asset('images/logo/logo.png') }}" alt="Logo"
                                style="width: 150px;height: 150px;" /></a>
                    </div>
                    <h1 class="auth-title" style="margin-top: -80px">Register.</h1>
                    <p class="auth-subtitle mb-5">Please enter your credentials below to proceed.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}" id="regForm">
                        @csrf


                        <div class="tab">
                            <p>
                                <input type="text" placeholder="Student ID"
                                    oninput="this.className = 'form-control form-control-xl'" id="student_id"
                                    name="student_id"
                                    class="form-control form-control-xl @error('student_id') is-invalid @enderror"
                                    value="{{ old('student_id') }}" required>

                                @error('student_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                        </div>

                        <div class="tab">
                            <p>
                                <input placeholder="First Name" oninput="this.className = 'form-control form-control-xl'"
                                    name="fname" id="fname" value="{{ old('fname') }}"
                                    class="form-control form-control-xl">
                            </p>

                            <p>
                                <input placeholder="Last Name" oninput="this.className = 'form-control form-control-xl'"
                                    name="lname" id="lname" value="{{ old('lname') }}"
                                    class="form-control form-control-xl">


                            </p>
                        </div>

                        <div class="tab">
                            <p>
                                <input placeholder="Passport No." oninput="this.className = 'form-control form-control-xl'"
                                    name="passport" id="passport" value="{{ old('passport') }}"
                                    class="form-control form-control-xl">
                            </p>

                            <p>
                                <input placeholder="iKad No." oninput="this.className = 'form-control form-control-xl'"
                                    name="ikad" id="ikad" value="{{ old('ikad') }}"
                                    class="form-control form-control-xl">
                            </p>

                        </div>

                        <div class="tab">
                            <p>
                                <label for="">Date of Birth :</label>
                                <input type="date" id="dob" name="dob" min="1900-01-01"
                                    value="{{ old('dob') }}" max="<?php
                                    $today = date('Y-m-d');
                                    $date = strtotime('today -17 year');
                                    echo date('Y-m-d', $date); ?>"
                                    class="form-control form-control-xl">
                            </p>


                            <p>
                                <input placeholder="Phone Number" oninput="this.className = 'form-control form-control-xl'"
                                    name="phone_num" id="phone_num" value="{{ old('phone_num') }}"
                                    class="form-control form-control-xl">
                            </p>

                            <p>
                                <input placeholder="Address in Indonesia"
                                    oninput="this.className = 'form-control form-control-xl'" name="add_id" id="add_id"
                                    value="{{ old('add_id') }}" class="form-control form-control-xl">
                            </p>

                        </div>

                        <div class="tab">
                            <p>
                                <select class="form-control form-control-xl @error('campus_id') is-invalid @enderror"
                                    aria-label="Default select example" name="campus_id" id="campus_id">
                                    <option selected value="" disabled>Select Campus....</option>
                                    @foreach ($campus as $item)
                                        <option value="{{ $item->id }}">{{ $item->campus }}</option>
                                    @endforeach

                                </select>

                                @error('campus_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>

                            <p>
                                <input placeholder="Address in Malaysia"
                                    oninput="this.className = 'form-control form-control-xl'" name="add_my" id="add_my"
                                    value="{{ old('add_my') }}" class="form-control form-control-xl">
                            </p>


                            <div class="form-check form-switch">

                                <input class="form-check-input" type="checkbox" name="curr" id="curr">

                                <input type="hidden" name="cur_living" id="cur_living" value="Indonesia">

                                <label class="form-check-label" for="cur_living">
                                    Currently living in Malaysia</label>
                            </div>

                            <br>
                            <br>

                        </div>

                        <div class="tab">

                            <p>
                                <label for="">Status Keanggotaan PPIM :</label>

                                <select class="form-control form-control-xl" aria-label="Default select example"
                                    name="status" id="status">
                                    <option selected value="Biasa">Biasa</option>
                                    <option value="Penuh">Penuh</option>
                                </select>
                            </p>
                        </div>

                        <div class="tab">
                            <p>
                                <input type="email"
                                    class="form-control form-control-xl @error('email') is-invalid @enderror"
                                    placeholder="Email" oninput="this.className = 'form-control form-control-xl'"
                                    name="email" id="email" value="{{ old('email') }}" type="email">

                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>

                            <p>
                                <input placeholder="Password" oninput="this.className = 'form-control form-control-xl'"
                                    name="password" id="password" value="{{ old('password') }}" type="password"
                                    class="form-control form-control-xl @error('password') is-invalid @enderror">

                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>

                            <p>
                                <input placeholder="Confirm Password"
                                    oninput="this.className = 'form-control form-control-xl'" name="password_confirmation"
                                    id="password-confirm" type="password" class="form-control form-control-xl">
                            </p>


                        </div>



                        <div>
                            <button type="button" id="nextBtn" class="btn btn-danger btn-block btn-lg shadow-lg"
                                onclick="nextPrev(1)">Next</button>

                            <button type="button" id="prevBtn" class="btn btn-primary btn-block btn-lg shadow-lg mt-2"
                                onclick="nextPrev(-1)">Previous</button>

                        </div>


                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>


                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
@endsection

@section('addScript')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <script>
        $('#curr').change(function() {
            if ($(this).prop('checked')) {
                $('#cur_living').val('Malaysia');
            } else {
                $('#cur_living').val('Indonesia');
            }
        });
    </script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }

            //password and confirm password not the same
            if (y = x[6] &&
                document.getElementsByName("pwd").value !== document.getElementsByName("cpwd").value) {
                document.getElementsByName("pwd").className += "invalid";
                document.getElementsByName("cpwd").className += "invalid";
                valid = false;
            }

            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
@endsection
