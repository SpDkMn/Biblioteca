<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Editar</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.box-header -->


	<form action="{{ route('editorial.update', $editorial->id) }}"
		method="POST">


		{{ csrf_field() }} {{ method_field('PUT') }}
		<div class="box-body">

			<div class="form-group">
				<label for="name">Nombre </label> <input type="text"
					class="form-control" name="name" value="{{ $editorial->name }}">
			</div>
      <?php
      $id_1 = $id_2 = $id_3 = $id_4 = false;
      foreach ($editorial->categories as $category) {
         switch ($category->name) {
            case 'libro':
               $id_1 = true;
               break;
            case 'revista':
               $id_2 = true;
               break;
            case 'tesis':
               $id_3 = true;
               break;
            case 'compendio':
               $id_4 = true;
               break;
         }
      }
      ?>

      <div class="form-group">
				<label>Categoria</label> <select
					class="form-control selectCategoryEdit" multiple="multiple"
					data-placeholder="Seleccione la categoria" name="category[]"
					style="width: 100%;"> @if($id_1)
					<option selected>libro</option> @else
					<option>libro</option>@endif @if($id_2)
					<option selected>revista</option> @else
					<option>revista</option>@endif @if($id_3)
					<option selected>tesis</option> @else
					<option>tesis</option>@endif @if($id_4)
					<option selected>compendio</option> @else
					<option>compendio</option>@endif
				</select>

			</div>
			<script> $(document).ready(function(){$('.selectCategoryEdit').select2();}) </script>


		</div>

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Editar</button>
		</div>
	</form>

</div>
<!-- /.box -->