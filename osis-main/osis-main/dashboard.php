<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OSIS Chairman Election</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f3f4;
        }
    </style>
  </head>
  <body>
  <h2 class="mt-5 mb-5 ms-auto text-center" style="color: black;">OSIS Chairman Election</h2>

  <form method="post" action="" id="voteForm">
    <div class="container text-center p-2">
    <?php
    $query = mysqli_query($connection, 'SELECT * FROM vote;');
    foreach($query as $data){
      $id = $data['id'];
      $name = $data['nama_osis'];
    ?>
      <input type="radio" name="option" class="btn-check" id="btn-check-<?= $id ?>" value="<?= $id ?>" data-name="<?= $name ?>" autocomplete="off">
      <label class="btn" for="btn-check-<?= $id ?>">
        <div class="card" style="width: 18rem;" id="card-<?= $id ?>">
          <img src="img/<?= $data['photo'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text"><strong><?= $name ?></strong><br>Vision and Mission: <?= $data['visi_dan_misi']?></p>
          </div>
        </div>
      </label>
    <?php } ?>
    </div>
    <br><br>
    <button type="button" class="btn btn-primary position-absolute top-80 start-50 translate-middle w-50" onclick="handleVote()">Vote</button>
    <br><br>
  </form>

  <div class="modal fade" id="voteModal" tabindex="-1" aria-labelledby="voteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="voteModalLabel">Thank You!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p id="voteMessage"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="submitForm()">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    function handleVote() {
      const selectedOption = document.querySelector('input[name="option"]:checked');
      if (selectedOption) {
        const candidateName = selectedOption.getAttribute('data-name');
        document.getElementById('voteMessage').innerText = `You have voted for ${candidateName}`;

        document.querySelectorAll('.card').forEach(card => card.classList.remove('selected'));
        const selectedCard = document.getElementById(`card-${selectedOption.value}`);
        if (selectedCard) {
          selectedCard.classList.add('selected');
        }

        var myModal = new bootstrap.Modal(document.getElementById('voteModal'), {
          keyboard: false
        });
        myModal.show();
      } else {
        alert("Please select a candidate first!");
      }
    }

    function submitForm() {
      document.getElementById('voteForm').submit();
    }
  </script>

  </body>
</html>