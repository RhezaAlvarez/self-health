<html>

<head>
  <title>Autocomplete Search Box using Typeahead in Codeigniter</title>

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  <!-- <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
  <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>

</head>

<body>
  <div class="container">
    <div class="form-group" id="prefetch">
      <input type="text" class="form-control typeahead" placeholder="Search Here" />
    </div>
  </div>
</body>

<script>
  $(document).ready(function() {
    var sample_data = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch: '<?php echo base_url(); ?>autocomplete/fetch',
      remote: {
        url: '<?php echo base_url(); ?>autocomplete/fetch/%QUERY',
        wildcard: '%QUERY'
      }
    });


    $('#prefetch .typeahead').typeahead(null, {
      name: 'sample_data',
      display: 'name',
      source: sample_data,
      limit: 10,
      templates: {
        suggestion: Handlebars.compile('<div class="row"><div class="col-md-2" style="padding-right:5px; padding-left:5px;"></div><div class="col-md-10" style="padding-right:5px; padding-left:5px;">{{name}}</div></div>')
      }
    });
  });
</script>
