<div class="white_shd full margin_bottom_30">
    <div class="table_section padding_infor_info">
        <div class="table-sm">
            <table class="table">
                <thead>
                    <tr style="color: black;"><b>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </b></tr>
                </thead>
                <tbody>
                    @foreach($val as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->companyName}}</td>
                        <td>{{$user->emailAddress}}</td>
                        <td>{{$user->phoneNumber}}</td>
                        <td><a class="fw_icon" href="{{ route('shareTo', ['idUser' => $user->id,'idCard' => $idCard]) }}"><i class="fa fa-check-square" style="padding-left: 15px;"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>