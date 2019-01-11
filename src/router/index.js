import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import News from '@/components/News'
import NewsDetail from '@/components/NewsDetail'
import About from '@/components/About'
import Product from '@/components/Product'
import Contact from '@/components/Contact'
import ProductDetail from '@/components/ProductDetail'
import Cart from '@/components/Cart'
// import Cart2 from '@/components/Cart2'
import Carousel from '@/components/Carousel'
import Login from '@/components/Login'
import Register from '@/components/Register'
import Travels from '@/components/Travels'
import TravelNote from '@/components/TravelNote'
import Termini from '@/components/Termini'
import TerminiDetail from '@/components/TerminiDetail'
import TravelMall from '@/components/TravelMall'
import TravelMallDetail from '@/components/TravelMallDetail'
import Hotel from '@/components/Hotel'
import HotelDetail from '@/components/HotelDetail'
import Personal from '@/components/Personal'
import child1 from '@/components/child1'
import child2 from '@/components/child2'
import child3 from '@/components/child3'
import editmessage from '@/components/EditMessage'
import OrderComment from '@/components/OrderComment'


Vue.use(Router)

export default new Router({
  routes: [
    { path: '/',component: Index  },
    { path: '/cart',component: Cart  },
    // { path: '/cart2',component: Cart2  },
    { path: '/register',component: Register},
    { path: '/login',component: Login  },
    { path: '/index',component: Index  },
    { path: '/news',component: News},
    { path: '/newsdetail',component: NewsDetail},
    { path: '/about',component: About },
    { path: '/product',component: Product },
    { path: '/contact',component: Contact },
    { path: '/prodetail',component: ProductDetail },
    { path: '/travels',component: Travels },
    { path: '/travelnote',component: TravelNote },
    { path: '/termini',component: Termini },
    { path: '/terminidetail',component: TerminiDetail },
    { path: '/travelmall',component: TravelMall },
    { path: '/hotel',component: Hotel },
    { path: '/travelmalldetail',component: TravelMallDetail },
    { path: '/hoteldetail',component: HotelDetail },
    { path: '/personal',
      component: Personal,
      children:[
          {path:"",component:child1},
          {path:"child1",component:child1},
          {path:"child2",component:child2},
          {path:"child3",component:child3},
          {path:"editmessage",component:editmessage},
          {path:"ordercomment",component:OrderComment},
      ]
    },
  ]
})
