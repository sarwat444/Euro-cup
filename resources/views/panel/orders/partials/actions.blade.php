<td>
    <ul class="action">
        <li class="edit"><a href="{{route('panel.orders.show',$order->id)}}"><i class="fa fa-eye"></i></a></li>
        <li class="delete" hidden=""><a href="javascript:;" class="delete_item" data-url="{{route('panel.orders.delete',$order->id)}}"><i class="icon-trash"></i></a></li>
    </ul>
</td>
