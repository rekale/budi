<li class="{{ Request::is('destinations*') ? 'active' : '' }}">
    <a href="{!! route('destinations.index') !!}"><i class="fa fa-edit"></i><span>Destinations</span></a>
</li>
<li class="{{ Request::is('agendas*') ? 'active' : '' }}">
    <a href="{!! route('agendas.index') !!}"><i class="fa fa-edit"></i><span>Agendas</span></a>
</li>
<li class="{{ Request::is('participants*') ? 'active' : '' }}">
    <a href="{!! route('participants.index') !!}"><i class="fa fa-edit"></i><span>Participants</span></a>
</li>


