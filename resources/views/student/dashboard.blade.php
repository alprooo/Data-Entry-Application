@extends('layouts.main')

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
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Student Data</h3>
                                <p class="text-subtitle text-muted">
                                    List data yang sudah anda daftarkan pada form registrasi di aplikasi.
                                </p>

                            </div>
                            <div class="card-body">

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        {{ $message }}
                                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif



                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('student.update') }}" id="regForm">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $user->id }}">


                                    <div class="tab">
                                        <p>
                                            <label for="">Student ID</label>
                                            <input type="text" placeholder="Student ID"
                                                oninput="this.className = 'form-control '" id="student_id" name="student_id"
                                                class="form-control  @error('student_id') is-invalid @enderror"
                                                value="{{ $user->student_id }}" required>

                                            @error('student_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="tab">
                                        <p>
                                            <label for="">First Name</label>
                                            <input placeholder="First Name" oninput="this.className = 'form-control'"
                                                name="fname" id="fname" value="{{ $user->fname }}"
                                                class="form-control">
                                        </p>

                                        <p>
                                            <label for="">Last Name</label>
                                            <input placeholder="Last Name" oninput="this.className = 'form-control '"
                                                name="lname" id="lname" value="{{ $user->lname }}"
                                                class="form-control ">


                                        </p>
                                    </div>

                                    <div class="tab">
                                        <p>
                                            <label for="">No Passport</label>
                                            <input placeholder="Passport No." oninput="this.className = 'form-control '"
                                                name="passport" id="passport" value="{{ $user->passport }}"
                                                class="form-control ">
                                        </p>

                                        <p>
                                            <label for="">No iKad</label>
                                            <input placeholder="iKad No." oninput="this.className = 'form-control '"
                                                name="ikad" id="ikad" value="{{ $user->ikad }}"
                                                class="form-control ">
                                        </p>

                                    </div>

                                    <div class="tab">
                                        <p>
                                            <label for="">Date of Birth :</label>
                                            <input type="date" id="dob" name="dob" min="1900-01-01"
                                                value="{{ $user->dob }}" max="<?php
                                                $today = date('Y-m-d');
                                                $date = strtotime('today -17 year');
                                                echo date('Y-m-d', $date); ?>"
                                                class="form-control ">
                                        </p>


                                        <p>
                                            <label for="">Phone Number</label>
                                            <input placeholder="Phone Number" oninput="this.className = 'form-control '"
                                                name="phone_num" id="phone_num" value="{{ $user->phone_num }}"
                                                class="form-control" type="number">
                                        </p>

                                        <p>
                                            <label for="">Address in Indonesia</label>
                                            <input placeholder="Address in Indonesia"
                                                oninput="this.className = 'form-control '" name="add_id" id="add_id"
                                                value="{{ $user->add_id }}" class="form-control ">
                                        </p>

                                    </div>

                                    <div class="tab">
                                        <p>
                                            <label for="">Campus</label>
                                            <select class="form-control  @error('campus_id') is-invalid @enderror"
                                                aria-label="Default select example" name="campus_id" id="campus_id">
                                                <option selected value="" disabled>Select Campus....</option>
                                                @foreach ($campus as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($user->campus_id == $item->id) selected @endif>
                                                        {{ $item->campus }}</option>
                                                @endforeach

                                            </select>

                                            @error('campus_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>

                                        <p>
                                            <label for="">Address in Malaysia</label>
                                            <input placeholder="Address in Malaysia"
                                                oninput="this.className = 'form-control '" name="add_my" id="add_my"
                                                value="{{ $user->add_my }}" class="form-control ">
                                        </p>


                                        <div class="form-check form-switch">

                                            <input class="form-check-input" type="checkbox" name="curr"
                                                id="curr">

                                            <input type="hidden" name="cur_living" id="cur_living"
                                                value="{{ $user->cur_living }}">

                                            <label class="form-check-label" for="cur_living">
                                                Currently living in Malaysia</label>
                                        </div>

                                        <br>
                                        <br>

                                    </div>

                                    <div class="tab">

                                        <p>
                                            <label for="">Status Keanggotaan PPIM :</label>

                                            <select class="form-control " aria-label="Default select example"
                                                name="status" id="status">
                                                <option selected value="Biasa"
                                                    @if ($user->status == 'Biasa') selected @endif>Biasa
                                                </option>
                                                <option value="Penuh" @if ($user->status == 'Penuh') selected @endif>
                                                    Penuh</option>
                                            </select>
                                        </p>
                                    </div>

                                    <div>
                                        <button type="button" id="nextBtn"
                                            class="btn btn-danger btn-block btn-lg shadow-lg"
                                            onclick="nextPrev(1)">Next</button>

                                        <button type="button" id="prevBtn"
                                            class="btn btn-primary btn-block btn-lg shadow-lg mt-2"
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

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection

@section('addScript')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>

    <script>
        var curr = $('#cur_living').val();
        // alert(curr);
        if (curr == "Malaysia") {
            $("#curr").prop('checked', true);
        }
    </script>

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
