<style>
        .sidenav {
              height: 100%; /* 100% Full-height */
              width: 0; /* 0 width - change this with JavaScript */
              position: fixed; /* Stay in place */
              z-index: 1000; /* Stay on top */
              top: 0; /* Stay at the top */
              left: 0;
              /*background-color: #777;  Black*/
              overflow-x: hidden; /* Disable horizontal scroll */
              padding-top: 60px; /* Place content 60px from the top */
              transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
          }

          /* The navigation menu links */
        .sidenav a {
          padding: 8px 8px 8px 32px;
          text-decoration: none;
          font-size: 25px;
          color: #818181;
          display: block;
          transition: 0.3s;
        }


        .sidenav a:hover {
          color: #f1f1f1;
        }


        .sidenav .closebtn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
          .sidenav {padding-top: 15px;}
          .sidenav a {font-size: 18px;}
        }
</style>