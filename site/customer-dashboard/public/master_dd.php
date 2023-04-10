          <style>
            /* Master Page Styles */
            .master-page {
              position: relative;
              z-index: 1;
            }

            .dropdown-menu {
              position: absolute;
              top: 30px;
              left: 0;
              background-color: #fff;
              border: 1px solid #ccc;
              padding: 10px;
              display: none;
            }

            .dropdown-menu li {
              list-style: none;
            }

            .dropdown-menu li a {
              color: #333;
              text-decoration: none;
            }

            /* Existing Page Styles */
            .existing-page {
              position: relative;
              z-index: 0;
              margin-top: -30px;
            }
          </style>
          <div class="relative inline-flex .master-page ">
            <select class="w-full pl-8 pr-2 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-select">
              <option value="" selected disabled>Choose Property</option>
              <option value="option1">Option 1</option>
              <option value="option2">Option 2</option>
              <option value="option3">Option 3</option>
            </select>

          </div>