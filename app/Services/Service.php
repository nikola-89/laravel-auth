<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public static function gimmeLorem() {

    	$loremFull = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dapibus ante id venenatis semper. Etiam eget nunc accumsan, imperdiet orci at, rutrum nisi. Nam blandit egestas dolor et dictum. Nulla facilisi. Integer in ullamcorper massa. Maecenas eget sem sodales, ultricies nisi vitae, ultrices elit. Cras a bibendum justo.

Sed sapien orci, dictum a convallis at, feugiat ut tortor. Quisque ut mollis lorem. Pellentesque in nisl odio. Vivamus elit lacus, commodo vitae eros vel, sodales vestibulum augue. Quisque suscipit ante id turpis elementum, sit amet fringilla leo sagittis. Suspendisse efficitur euismod facilisis. Phasellus imperdiet dapibus tincidunt. Nullam ipsum urna, placerat in pellentesque eget, tristique et magna. Integer rutrum suscipit nulla sit amet aliquet. Morbi rutrum leo quis massa molestie, eget luctus nibh interdum. In auctor tempor magna, sagittis pulvinar felis aliquet id. Sed a commodo quam, sed sagittis lorem. Phasellus viverra congue enim eget congue. Nullam tincidunt fermentum lorem et egestas. Fusce pulvinar id massa eget rutrum. Mauris rhoncus lorem et neque mattis auctor.

Suspendisse vitae mauris egestas est aliquam venenatis eget vel libero. Ut sit amet urna eget tellus pharetra maximus in eu leo. Integer a mauris volutpat, aliquam felis scelerisque, viverra tortor. Suspendisse efficitur commodo sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas rutrum efficitur lobortis. Vestibulum in pharetra neque. Proin sed efficitur eros.

Donec sit amet libero ac quam ultricies suscipit sit amet sit amet nisl. Mauris faucibus neque sit amet lectus sagittis, at aliquet leo lacinia. Maecenas non tristique est, ac vestibulum lectus. Nulla congue ipsum in consectetur interdum. Mauris sed mattis purus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris eu consequat tellus, id molestie tortor. Vivamus non pharetra leo, a ultrices nibh. Sed tellus massa, rhoncus ac lorem ac, fermentum convallis odio. Maecenas et iaculis massa. Aliquam rutrum interdum lectus et convallis.

Maecenas venenatis dui in nunc mattis, vel interdum lacus efficitur. Fusce dignissim condimentum risus, et scelerisque quam interdum eu. Vestibulum arcu felis, efficitur sit amet maximus vel, aliquet egestas mauris. Sed quis neque porta quam accumsan viverra viverra blandit sapien. In nec accumsan ex, quis auctor tortor. Donec imperdiet est dolor, vitae lacinia justo tempus venenatis. Duis eu varius ante. Morbi semper egestas ex, non cursus tellus vulputate vel. Mauris ultrices diam mollis ante pellentesque mattis. Vivamus vitae justo dui. Aliquam tincidunt massa cursus, auctor libero quis, condimentum dolor. Nullam ultricies vitae libero quis tincidunt. Curabitur convallis augue in euismod lobortis. Cras auctor odio et nisl pellentesque, vel egestas odio tristique. Nam dolor velit, tempor eget sodales in, efficitur vitae sapien.';

    	return $loremFull;
	}
}
