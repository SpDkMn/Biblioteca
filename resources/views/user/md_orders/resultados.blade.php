<div class="box-body table-responsive">

		<table id="example1" class="table table-bordered table-striped table-hover" >
		   <thead>
			<tr style="background:#E7FAE2;">
				<th class="text-center">Título</th>
				<th class="text-center">Autor</th>
				<th class="text-center">Editorial</th>
				<th class="text-center">Nº ejemplares</th>
				<th class="text-center">Clasificación</th>
			</tr>
			</thead>
			@foreach($books as $book)
			<tr>
				<td class="text-center"><a href="#" data-id="{{$book->id}}" class="contenid">{{$book->title}} - Edición {{$book->edition}}</a></td>
				<td class="text-center">
            <?php $cont=0; ?>
            @foreach($book->authors as $author)
              @if($author->pivot->type == true)
              <?php $cont=$cont+1; ?>
              @endif
            @endforeach 
            <?php $cont2=2; ?>
            @foreach($book->authors as $author)
              @if($author->pivot->type == true)
              {{$author->name}}
                @if($cont2<=$cont)
                ,
                @endif
              @endif
              <?php $cont2=$cont2+1; ?>
            @endforeach   
          </td>
				<td class="text-center">@foreach($book->editorials as $editorial)
					@if($editorial->pivot->type == true) {{$editorial->name}} @endif
					@endforeach</td>

				<td class="text-center">
          <?php $cont=0 ?>
          @foreach($book->bookCopies as $copy)
            <?php $cont=$cont+1; ?>
          @endforeach
          {{$cont}}
        </td>
				<td class="text-center">{{$book->clasification}}</td>
				

			</tr>
			@endforeach

		</table>
	</div>