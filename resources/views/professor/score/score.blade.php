<td>{{$sc->user->first_name . ' ' . $sc->user->last_name}}</td>
<td>{{$sc->score}}</td>
<td><button style="border: none;outline: none;background: #5cb85c;border-radius: 5px;" data-toggle="modal" data-target="#exampleModal-{{$sc->id}}"><span class="label label-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></button></td>