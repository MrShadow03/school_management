@php
    foreach (['admin', 'student', 'teacher', 'parent', 'stuff'] as $i_guard) {
        if (Auth::guard($i_guard)->check()) {
            $guard = $i_guard;
            break;
        } else {
            $guard = '';
        }
    }
    $user = Auth::guard($guard)->user() ?? 'invalid user';
    $logout_route = $guard . '.logout';
@endphp

@section('title')
    <title>Teacher-Students</title>
@endsection
@extends('dashboard.app')
@section('exclusive_styles')
@endsection
@section('main')
    <x-dashboard.organisms.sidebar />
    <div class="right_content">
        <x-dashboard.organisms.nav :username="$user->name" :logout_route="$logout_route" />
        <x-dashboard.organisms.account-bar route="admin.account.index"
            inner_text="<i class='fa-regular fa-arrow-left'></i> &nbsp; Back" />
        <x-dashboard.organisms.account-form-sm />
    </div>
@endsection
@section('exclusive_scripts')
    <script>
        //Tom selects
        new TomSelect("#classes", {
            create: true,
            plugins: {
                dropdown_input: {
                    title: 'Add New Class'
                }
            }
        });

        //count children
        countChildren();
        //count total cost
        totalCost();

        let parent = document.querySelector('.input_group_wrapper');
        document.addEventListener("keydown", handleKeyPress, false);
        // const btn1 = document.querySelector('.btn1');
        // btn1.addEventListener("click", addAnother);
        const btn2 = document.querySelector('.btn2');
        btn2.addEventListener("click", removeLast);

        //handle key press
        function handleKeyPress(e) {
            if (e.ctrlKey && e.keyCode == 40) {
                addAnother();
            } else if (e.ctrlKey && e.keyCode == 38) {
                let hasMoreThanOneChild = parent ? parent.children.length > 1 : false;
                hasMoreThanOneChild && removeLast();
            }
        }

        //function to add another pair of input fields
        function addAnother() {
            let parent = document.querySelector('.input_group_wrapper');
            //count children
            let children_count = parent.children.length;
            //get the current valuse
            let arr = [];
            for (let i = 0; i < children_count; i++) {
                let key = document.getElementById(`key${i+1}`).value;
                let value = document.getElementById(`value${i+1}`).value;
                arr.push({
                    key,
                    value
                });
            }
            //define inner html
            let inner_html = `
                            <div class="input_group" style="grid-gap: 1rem">
                                <div class="input_field">
                                    <input type="text" id="key${children_count+1}" name="key${children_count+1}" placeholder="Expance name" required>
                                </div>
                                <div class="input_field">
                                    <input type="number" id="value${children_count+1}" name="value${children_count+1}" placeholder="Cost" onkeyup="totalCost()" required>
                                </div>
                            </div>
                            `;
            //append to parent
            parent.innerHTML += inner_html;
            //set the current values
            for (let i = 0; i < children_count; i++) {
                document.getElementById(`key${i+1}`).value = arr[i].key;
                document.getElementById(`value${i+1}`).value = arr[i].value;
            }
            //update number of key value pairs
            countChildren();
            //update total cost
            totalCost();
        }

        //function to remove last pair of input fields
        function removeLast() {
            let hasMoreThanOneChild = parent ? parent.children.length > 1 : false;
            if (hasMoreThanOneChild) {
                //count children
                let children_count = parent.children.length;
                //get the current valuse
                let arr = [];
                for (let i = 0; i < children_count; i++) {
                    let key = document.getElementById(`key${i+1}`).value;
                    let value = document.getElementById(`value${i+1}`).value;
                    arr.push({
                        key,
                        value
                    });
                }
                //remove last child
                parent.removeChild(parent.lastChild);
                //alert('remove last');
                //set the current values
                for (let i = 0; i < children_count - 1; i++) {
                    document.getElementById(`key${i+1}`).value = arr[i].key;
                    document.getElementById(`value${i+1}`).value = arr[i].value;
                }
                //update total cost
                totalCost();
                //update number of key value pairs
                countChildren();
            }
        }

        function totalCost() {
            let parent = document.querySelector('.input_group_wrapper');
            let children_count = parent.children.length;
            let total = 0;
            for (let i = 0; i < children_count; i++) {
                let value = document.getElementById(`value${i+1}`).value;
                let isValueNullOrEmpty = value == null || value == '';
                if (!isValueNullOrEmpty) {
                    total += parseInt(value);
                }
            }
            document.getElementById('total_cost').value = total;
            console.log(total);
        }

        function countChildren() {
            let parent = document.querySelector('.input_group_wrapper');
            let children_count = parent.children.length;
            document.getElementById('number_of_key_value_pairs').value = children_count;
        }

    </script>
@endsection
