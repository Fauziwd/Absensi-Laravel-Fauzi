<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id - Name' }}</label>
    <!-- <input class="form-control" name="group_id" type="number" id="group_id" value="{{ isset($schedule->group_id) ? $schedule->group_id : ''}}" > -->

    <select class="form-control" name="group_id" id="group_id">
        <option>PILIH GROUP</option>
        @foreach ($schedule as $group)
        <option value="{{ $group->id }}" {{ isset($schedule->group_id) && $schedule->group_id == $group->id ? 'selected' : '' }}>{{ $group->id }}. {{ $group->name }}</option>
        @endforeach
    </select>

    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id - Name' }}</label>
    <!-- <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($schedule->user_id) ? $schedule->user_id : ''}}"> -->

    <select class="form-control" name="user_id" id="user_id">
        <option>PILIH USERS</option>
        @foreach ($schedule as $group)
        <option value="{{ $group->users_id }}" {{ isset($schedule->group_id) && $schedule->group_id == $group->users_id ? 'selected' : '' }}>{{ $group->users_id }}. {{ $group->users_name }}</option>
        @endforeach
    </select>

    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="control-label">{{ 'Note' }}</label>
    <input class="form-control" name="note" type="text" id="note" value="{{ isset($schedule->note) ? $schedule->note : ''}}">
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_start_at') ? 'has-error' : ''}}">
    <label for="time_start_at" class="control-label">{{ 'Time Start At' }}</label>
    <input class="form-control" name="time_start_at" type="text" id="time_start_at" value="{{ isset($schedule->time_start_at) ? $schedule->time_start_at : ''}}">
    {!! $errors->first('time_start_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('time_end_at') ? 'has-error' : ''}}">
    <label for="time_end_at" class="control-label">{{ 'Time End At' }}</label>
    <input class="form-control" name="time_end_at" type="text" id="time_end_at" value="{{ isset($schedule->time_end_at) ? $schedule->time_end_at : ''}}">
    {!! $errors->first('time_end_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>