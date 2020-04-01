<style>
  @page {
    margin: 0;
    padding: 0;
  }

  body {
    font-family: FuturaStd-Light;
    margin: 0;
    padding: 0;
  }

  .secretary .background-image {
    background-color: black;
    background-repeat: no-repeat;
    background-position: left top;
    background-size: cover;
    object-fit: cover;

    height: 242pt;
    left: 0;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 0;
    width: 153pt;
  }

  .secretary .photo {
    background-color: black;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;

    border: 0px solid black;
    border-radius: 15px;
    height: 72pt;
    left: 42pt;
    overflow: hidden;
    position: absolute;
    top: 59pt;
    width: 72pt;
    z-index: 2;
  }

  .secretary .photo-image {
    top: 0;
    margin: 0;
    padding: 0;
    position: absolute;
    left: 0;
  }

  .secretary .hidden {
    display: none;
  }


  .secretary .details {
    text-align: center;
        position: absolute;
        top: 130pt;
        z-index: 2;
  }

  .secretary .representation {
    color: black;
    font-size: 10pt;
    font-weight: 600;
    line-height: 12pt;
    margin: 0 0 3pt 0;
    padding: 0;
  }

  .secretary .commission {
    color: black;
    font-size: 09pt;
    font-weight: 300;
    line-height: 08pt;
    margin: 0 0 10pt 0;
    padding: 0;
  }

  .secretary .name {
    color: black;
    font-size: 10pt;
    font-weight: 600;
    line-height: 12pt;
    margin: 0 0 3pt 0;
    padding: 0;
  }


</style>

<div class="secretary card">
    <img class="background-image" src='{{ public_path() }}/media/SECRETARIA.png' height="242pt" width="153pt">
    <div class="photo">
        <img class="photo-image" src="{{ $participant->getImagePath() }}" width="96px">
    </div>

    <div class="details">
      <h1 class="name">{{ $participant->getFullName() }}</h1>
      <h1 class="representation">{{ $participant->getRepresentation() }}</h1>
      <h2 class="commission">{{ $participant->getCommission() }}</h2>
    </div>
</div>
