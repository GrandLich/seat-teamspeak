<div class="modal fade" role="dialog" id="confirm-ts-registration">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">
          <i class="fab fa-teamspeak"></i> Teamspeak Registration
        </h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Please join the teamspeak server with the information displayed bellow.<br/>
          Once you'll be on the server with proper nickname, click on the <code>Confirm</code> button.</p>
        <form method="post" id="ts-registration-form" class="form-horizontal">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="col-sm-3 control-label" for="ts-server-host">Server Address</label>
            <div class="col-sm-9">
              <input type="text" value="{{ $settings->server_host }}:{{ $settings->server_port }}" readonly="readonly" id="ts-server-host" class="form-control input-sm" />
            </div>
          </div>
          @if(property_exists($settings, 'server_password') && ! empty($settings->server_password))
          <div class="form-group">
            <label class="col-sm-3 control-label" for="ts-server-password">Server Password</label>
            <div class="col-sm-9">
              <input type="text" value="{{ $settings->server_password }}" readonly="readonly" id="ts-server-password" class="form-control input-sm" />
            </div>
          </div>
          @endif
          <div class="form-group">
            <label class="col-sm-3 control-label" for="ts-nickname">Privilege Key</label>
            <div class="col-sm-9">
              <input type="text" value="{{ $registration_token }}" readonly="readonly" id="ts-nickname" class="form-control input-sm" />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-outline-secondary pull-left" type="button" data-dismiss="modal">Close</button>
        <a href="{{ sprintf('ts3server://%s:%d?nickname=%s&token=%s', $settings->server_host, $settings->server_port, $identities[0]->buildConnectorNickname(), $registration_token) }}" class="btn btn-primary">
          <i class="fas fa-sign-in-alt"></i> Join
        </a>
        <button class="btn btn-success" type="submit" form="ts-registration-form">
          <i class="fas fa-check"></i> Confirm
        </button>
      </div>
    </div>
  </div>
</div>
