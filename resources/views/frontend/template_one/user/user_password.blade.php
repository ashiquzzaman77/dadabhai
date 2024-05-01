<div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
    <div>

        <div class="heading-2">
            <h3 class="title-3 fsz-15 grenadier-color"> Change Password</h3>
        </div>

        <form action="{{ route('template.one.user.password.update') }}" method="POST" class="col-md-12 text-start" id="myForm" novalidate="">
            
            @csrf

            <div class="form-group">
                <label for="old_password">Old Password <span class="red-clr">*</span></label>
                <input type="password" name="old_password" placeholder="Enter Old Password" 
                    class="form-control" required>
            </div>

            <div class="form-group">
                <label for="new_password">New Password <span class="red-clr">*</span></label>
                <input type="password" name="new_password" placeholder="Enter New Password"
                    class="form-control" required="">
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm Password <span class="red-clr">*</span></label>
                <input type="password" name="confirm_password"
                    placeholder="Enter Confirm Password" class="form-control" required>
                
            </div>
            <div class="">
                <button type="submit" style="cursor: pointer" class="grenadier-bg p-2 border-0 text-white px-4">
                    Password Update
                </button>
            </div>
        </form>
        {{-- Dashboard Links End --}}
    </div>
</div>
