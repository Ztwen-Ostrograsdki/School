<template>
	<div id="wrapper-admin" class="position-absolute modal-home-nav-admin border-right border-bottom" style="top: -20px; left: 0.0; display:none ; z-index: 1000000; background-image: url(/media/img/art-2578353_1920.jpg) !important; background-position: -200px 200px; padding: 0px; height: 460px;" >
	    <ul class="menu" style="width: 99%;">
	        <li class="item1 text-left">
	            <router-link to="/admin/director/master">
	                <i class="fa fa-home float-left mt-1 mr-3" style="font-size: 25px"></i>Dashboard
	            </router-link>
	        </li>
	        <li class="item2">
	            <a href="#">
	                <i class="fa fa-user-friends float-left mt-1 mr-3" style="font-size: 25px"></i>Les Utilisateurs 
	                <span id="span-counter">{{ ul }}</span>
	            </a>
	            <ul>
	                <li class="subitem1">
	                    <a href="#">Tous les Utilisateurs
	                    </a>
	                </li>
	                
	            </ul>
	        </li>
	        <li class="item3">
	            <a href="#">
	                <i class="fa fa-book float-left mt-1 mr-3" style="font-size: 25px"></i>Apprenants 
	                <span id="span-counter">{{ pl }}</span>
	            </a>
	            <ul>
	                <li class="subitem1">
	                    <router-link to="/admin/director/pupilsm">Tous les Apprenants
	                    </router-link>
	                </li>
	                <li class="subitem1">
	                	<a href="#">
	                		Primaires <i class="float-right mr-3"> ({{ ppl }}) </i>
	                	</a>
	                </li>
	                <li class="subitem2"><a href="#">Secondaires <i class="float-right mr-3">({{ psl }})</i></a></li>
	                <li class="subitem3">
	                	<router-link to="/admin/director/pupilsm/redList">Listes rouges ({{ pupilsBlockedsLength }})
	                    </router-link>
	                </li>
	            </ul>
	        </li>
	        <li class="item4">
	            <a href="#">
	                <i class="fa fa-user-friends float-left mt-1 mr-3" style="font-size: 25px"></i>Enseignants 
	                <span id="span-counter">{{ tl }}</span>
	            </a>
	            <ul>
	                <li class="subitem1">
	                    <a  href="#">Tous les enseignants
	                    </a>
	                </li>
	                <li class="subitem1"><a href="#">Primaires <i class="float-right mr-3">({{ tpl }})</i></a></li>
	                <li class="subitem2"><a href="#">Secondaires <i class="float-right mr-3">({{ tsl }})</i></a></li>
	                <li class="subitem3"><a href="#">Supérieur</a></li>
	            </ul>
	        </li>
	        <li class="item5">
	            <a href="#">
	                <i class="fa fa-money float-left mt-1 mr-3" style="font-size: 25px"></i>Gestion - Finances 
	                <span id="span-counter">222</span>
	            </a>
	            <ul>
	                <li class="subitem1"><a href="#">Scolarité </a></li>
	                <li class="subitem2"><a href="#">Strange “Stuff”</a></li>
	                <li class="subitem3"><a href="#">Automatic Fails </a></li>
	            </ul>
	        </li>
	        <li class="item6">
	            <a href="#">
	                <i class="fa fa-phone float-left mt-1 mr-3" style="font-size: 25px"></i>Contacts
	                <span id="span-counter">16</span>
	            </a>
	            <ul>
	                <li class="subitem1"><a href="#">Cute Kittens </a></li>
	                <li class="subitem2"><a href="#">Strange “Stuff” </a></li>
	                <li class="subitem3"><a href="#">Automatic Fails </a></li>
	            </ul>
	        </li>
	    </ul>
	</div>

</template>


<script>
	import {mapState} from 'vuex'
	export default {
		props : ['allCounter'],
		
        created(){
        	this.$store.dispatch('getCounter')

	},

	computed: mapState([
		'pl', 'tl', 'ul', 'psl', 'ppl', 'tpl', 'tsl', 'pupilsBlockedsLength', 'user', 'admin'
	])
       

}


</script>
