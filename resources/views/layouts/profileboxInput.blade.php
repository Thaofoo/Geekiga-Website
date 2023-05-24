<div class="detail-box">

    <form method="post" action="/profile/edit" enctype="multipart/form-data">
        @csrf
        <input type="file" class="detail-input @error('image') isInvalid @enderror" name="image"  id="image">
        @error('image')
        <div class="error_msg">{{ $message }}</div>
        @enderror
        <table class="detail-table" cellspacing="8">
            <tr>
                <td class="detail-desc" width="25%%">First Name</td>
                <td class="detail-desc2 hidden">{{ $user->fname }}</td>
                <td class="detail-input">
                    <input class="inputprofile" type="text" placeholder="{{ $user->fname }}" id="fname" name="fname" class="@error('fname') isInvalid @enderror" value="{{ old('fname') }}">
                    @error('fname')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </td>

            </tr>
            <tr>
                <td class="detail-desc">Last Name</td>
                <td class="detail-desc2 hidden">{{ $user->lname }}</td>
                <td class="detail-input">
                    <input class="inputprofile" type="text" placeholder="{{ $user->lname }}" id="lname" name="lname" class="@error('lname') isInvalid @enderror" value="{{ old('lname') }}">
                    @error('lname')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td class="detail-desc">Email</td>
                <td class="detail-desc2 hidden">{{ $user->email }}</td>
                <td class="detail-input">
                    <input class="inputprofile" type="email" placeholder="{{ $user->email }}" id="email" name="email" class="@error('email') isInvalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="error_msg">{{ $message }}</div>
                    @enderror
                </td>
            </tr>
            <tr>
                <td class="detail-desc">Phone Number</td>
                <td class="detail-desc2 hidden">{{ $user->phone }}</td>
                <td class="detail-input">
                    <input class="inputprofile" type="text" placeholder="{{ $user->phone }}" id="phone" name="phone" class="@error('lname') isInvalid @enderror" value="{{ old('phone') }}">

                </td>
            </tr>
            <tr>
                <td class="detail-desc">Gender</td>
                <td class="detail-desc2 hidden">{{ $gender }}</td>
                <td class="detail-input radio-button">
                    @if ($gender = "Male")
                    <input type="radio" id="male" name="gender" value="m" checked>
                    <label class="radiolabel" for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="f">
                    <label class="radiolabel" for="female">Female</label><br>
                    @elseif ($gender = "Female")
                    <input type="radio" id="male" name="gender" value="m">
                    <label class="radiolabel" for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="f" checked>
                    <label class="radiolabel" for="female">Female</label><br>
                    @endif
                </td>
            </tr>

        </table>
        <button class="logout-button button" id="savebutton" type="submit">
            Save
        </button>
    </form>
</div>

<div class="logout-box">
    <form action="/logout" method="POST">
        @csrf
        <button class="logout-button button hidden" type="submit" id="outbutton">
            Sign Out
        </button>
    </form>

</div>
