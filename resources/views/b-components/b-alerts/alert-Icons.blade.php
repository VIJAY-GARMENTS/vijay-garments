<div>
    <div id="info">
    <div class="alert alert-primary d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
        <div>
            {{$slot}}
        </div>
    </div>
    </div>
    <div id="Success">
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            {{$slot}}
        </div>
    </div>
    </div>

    <div id="Warning">
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            {{$slot}}
        </div>
    </div>
    </div>

    <div id="Danger">
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            {{$slot}}
        </div>
    </div>
    </div>
</div>
