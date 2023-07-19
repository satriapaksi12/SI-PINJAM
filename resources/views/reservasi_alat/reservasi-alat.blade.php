@extends('layouts.app2')

@section('title', 'Reservasi Alat')
@section('fitur', 'RESERVASI ALAT')
@section('link', '/reservasi-alat')
@section('nama link', 'Reservasi Alat')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Cek Ketersediaan Alat</h4>
                        <form id="cekKetersediaanForm" action="{{ route('prosesCekKetersediaanAlat') }}" method="GET"
                            class="form-inline">
                            @csrf
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="tanggal_mulai" class="mr-2">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="cek_tanggal_mulai" name="cek_tanggal_mulai"
                                    required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="tanggal_selesai" class="mr-2">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="cek_tanggal_selesai"
                                    name="cek_tanggal_selesai" required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="jam_mulai" class="mr-2">Jam Mulai</label>
                                <input type="time" class="form-control" id="cek_jam_mulai" name="cek_jam_mulai" required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="jam_selesai" class="mr-2">Jam Selesai</label>
                                <input type="time" class="form-control" id="cek_jam_selesai" name="cek_jam_selesai"
                                    required>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <button id="cekKetersediaanButton" type="submit" class="btn btn-primary">Cek
                                    Ketersediaan</button>
                            </div>
                            <a id="submitItemsButton" class="btn btn-primary" style="display: none;">Submit</a>

                        </form>
                        <script>
                            $(document).ready(function() {
                                var selectedItems = []; // Array to store selected values

                                // Event handler for "Cek Ketersediaan" button
                                $('#cekKetersediaanButton').click(function(event) {
                                    event.preventDefault(); // Prevent form submission

                                    // Perform AJAX request
                                    $.ajax({
                                        url: $('#cekKetersediaanForm').attr('action'),
                                        method: 'GET',
                                        data: $('#cekKetersediaanForm').serialize(),
                                        success: function(response) {
                                            // Clear previous cards
                                            $('#cardContainer').empty();

                                            // Iterate over the response data and create card components
                                            $.each(response, function(index, data) {
                                                var card = `
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="card">
                <div class="card-content">
                  <img class="card-img-top img-fluid" src="${data.foto_alat[0].nama_foto}" alt="Card image cap" style="height: 12rem" />

                  <div class="card-body">
                    <h4 class="card-title">${data.no_inventaris}</h4>
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <th scope="row">Nama Alat</th>
                          <td>:</td>
                          <td>${data.nama_alat}</td>
                        </tr>
                        <tr>
                          <th scope="row">Lokasi</th>
                          <td>:</td>
                          <td colspan="2">${data.gedung.nama_gedung} ${data.gedung.lokasi.nama_lokasi}</td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                      <input type="checkbox" class="form-check-input reservasiCheckbox" value="${data.id}">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          `;

                                                $('#cardContainer').append(card);
                                            });

                                            // Show the card section
                                            $('#cardContentSection').show();

                                            // Show the submit button if at least one checkbox is checked
                                            if ($('input.reservasiCheckbox:checked').length > 0) {
                                                $('#submitItemsButton').show();
                                            }
                                        },
                                        error: function(error) {
                                            console.log(error);
                                        }
                                    });
                                });

                                // Event handler for checkbox selection
                                $(document).on('change', 'input.reservasiCheckbox', function() {
                                    // Check if at least one checkbox is checked
                                    if ($('input.reservasiCheckbox:checked').length > 0) {
                                        $('#submitItemsButton').show();
                                    } else {
                                        $('#submitItemsButton').hide();
                                    }
                                });

                                // Event handler for "Submit" button
                                $('#submitItemsButton').click(function(event) {
                                    event.preventDefault(); // Prevent anchor tag default action

                                    // Clear previous selection
                                    selectedItems = [];

                                    // Iterate over the checkboxes and add the selected values to the array
                                    $('input.reservasiCheckbox:checked').each(function() {
                                        selectedItems.push($(this).val());
                                    });

                                    // Update the hidden input value with the selected IDs
                                    $('#selectedAlatIDs').val(selectedItems.join(','));

                                    // Construct the redirect URL with the selected IDs
                                    var redirectURL = 'http://127.0.0.1:8000/reservasi-alat-add/' + selectedItems[0] + '?id=' +
                                        selectedItems.slice(1).join(',');
                                    // Submit the form
                                    $('#cekKetersediaanForm').submit();
                                    // // Log the selected items
                                    // console.log(selectedItems);
                                    // Fetch data alat based on selected IDs
                                    $.ajax({
                                        url: 'http://127.0.0.1:8000/get-reservasi-alat-data/' + selectedItems.join(','),
                                        method: 'GET',
                                        success: function(response) {
                                            // Clear previous table content
                                            $('#selectedAlatTableBody').empty();

                                            // Iterate over the response data and create table rows
                                            $.each(response, function(index, data) {
                                                var tableRow = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${data.no_inventaris}</td>
                            <td>${data.nama_alat}</td>
                            <td>${data.gedung.lokasi.nama_lokasi}</td>
                        </tr>
                    `;
                                                $('#selectedAlatTableBody').append(tableRow);
                                            });

                                            // Redirect to the specified URL
                                            window.location.href = redirectURL;
                                        },
                                        error: function(error) {
                                            console.log(error);
                                        }
                                    });

                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div id="cardContentSection" style="display: none;">
            <div class="row" id="cardContainer">
            </div>
        </div>
        <input type="hidden" id="selectedAlatIDs" name="selected_alat_ids" value="">
    @endsection
