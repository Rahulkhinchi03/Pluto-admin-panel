<!-- Sidebar --->
<div id="sidebar" class="bg-gray-800 flex-grow-0 flex-shrink-0 hidden lg:block overflow-hidden w-52 xl:w-64">
  @include('lyra::partials.logo')

  <!-- Menu --->
  <div id="menu" class="overflow-y-auto p-4">

    <router-link :to="{ name: 'dashboard' }">
      <div class="opacity-70 mr-3">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M17.8191 8.6976L15.9991 7.01389V3.6556C15.9991 3.581 15.9728 3.50946 15.9259 3.45671C15.879 3.40397 15.8154 3.37433 15.7491 3.37433H14.7491C14.6837 3.37479 14.6211 3.40404 14.5746 3.45583C14.5282 3.50762 14.5016 3.57782 14.5007 3.65138V5.62796L10.12 1.58128C9.80528 1.28644 9.40866 1.125 8.9991 1.125C8.58953 1.125 8.19291 1.28644 7.87816 1.58128L0.179098 8.6976C0.128741 8.74502 0.0871795 8.80313 0.0567854 8.86862C0.0263914 8.9341 0.00776053 9.00568 0.00195679 9.07927C-0.00384695 9.15286 0.00329007 9.22701 0.0229603 9.2975C0.0426306 9.36798 0.0744488 9.43342 0.116598 9.49007L0.436598 9.92251C0.521704 10.0368 0.643671 10.1084 0.775692 10.1216C0.907714 10.1348 1.03899 10.0885 1.14066 9.99282L1.9991 9.19966V15.7499C1.99984 16.0481 2.10544 16.3337 2.29281 16.5446C2.48019 16.7554 2.73411 16.8742 2.9991 16.875H6.9991C7.26409 16.8742 7.51801 16.7554 7.70538 16.5446C7.89276 16.3337 7.99836 16.0481 7.9991 15.7499V12.0935H9.9991V15.7499C9.99984 16.0481 10.1054 16.3337 10.2928 16.5446C10.4802 16.7554 10.7341 16.8742 10.9991 16.875H14.9991C15.2628 16.8744 15.5157 16.7568 15.7029 16.5478C15.8901 16.3387 15.9965 16.0551 15.9991 15.7584V9.19896L16.8594 9.99423C16.9611 10.0899 17.0924 10.1362 17.2244 10.123C17.3564 10.1098 17.4784 10.0382 17.5635 9.92391L17.8832 9.49182C17.9255 9.43502 17.9574 9.36937 17.977 9.29865C17.9967 9.22793 18.0038 9.15354 17.9978 9.07973C17.9919 9.00593 17.973 8.93418 17.9424 8.86861C17.9117 8.80303 17.8698 8.74491 17.8191 8.6976ZM14.4944 15.1874H11.4991V11.531C11.4984 11.2329 11.3928 10.9472 11.2054 10.7364C11.018 10.5256 10.7641 10.4068 10.4991 10.4059H7.4991C7.23411 10.4068 6.98019 10.5256 6.79281 10.7364C6.60544 10.9472 6.49984 11.2329 6.4991 11.531V15.1874H3.4991V7.81373L8.9991 2.72919L14.4991 7.81162L14.4944 15.1874Z"/></svg>
      </div>
      <div>Dashboard</div>
    </router-link>

    <router-link :to="{ name: 'media' }">
      <div class="opacity-70 mr-3">
        <svg width="18" height="18" viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M17.1 2.25H4.5C4.2613 2.25 4.03239 2.33889 3.8636 2.49713C3.69482 2.65536 3.6 2.86997 3.6 3.09375V5.625H8.1V3.9375H13.5V12.375H17.1C17.3387 12.375 17.5676 12.2861 17.7364 12.1279C17.9052 11.9696 18 11.755 18 11.5312V3.09375C18 2.86997 17.9052 2.65536 17.7364 2.49713C17.5676 2.33889 17.3387 2.25 17.1 2.25V2.25ZM6.525 4.96582C6.525 5.02876 6.49833 5.08912 6.45086 5.13362C6.40339 5.17812 6.33901 5.20312 6.27187 5.20312H5.42812C5.36099 5.20312 5.29661 5.17812 5.24914 5.13362C5.20167 5.08912 5.175 5.02876 5.175 4.96582V4.1748C5.175 4.11187 5.20167 4.05151 5.24914 4.007C5.29661 3.9625 5.36099 3.9375 5.42812 3.9375H6.27187C6.33901 3.9375 6.40339 3.9625 6.45086 4.007C6.49833 4.05151 6.525 4.11187 6.525 4.1748V4.96582ZM16.425 10.4502C16.425 10.5131 16.3983 10.5735 16.3509 10.618C16.3034 10.6625 16.239 10.6875 16.1719 10.6875H15.3281C15.261 10.6875 15.1966 10.6625 15.1491 10.618C15.1017 10.5735 15.075 10.5131 15.075 10.4502V9.65918C15.075 9.59624 15.1017 9.53588 15.1491 9.49138C15.1966 9.44688 15.261 9.42188 15.3281 9.42188H16.1719C16.239 9.42188 16.3034 9.44688 16.3509 9.49138C16.3983 9.53588 16.425 9.59624 16.425 9.65918V10.4502ZM16.425 7.70801C16.425 7.77095 16.3983 7.8313 16.3509 7.87581C16.3034 7.92031 16.239 7.94531 16.1719 7.94531H15.3281C15.261 7.94531 15.1966 7.92031 15.1491 7.87581C15.1017 7.8313 15.075 7.77095 15.075 7.70801V6.91699C15.075 6.85405 15.1017 6.7937 15.1491 6.74919C15.1966 6.70469 15.261 6.67969 15.3281 6.67969H16.1719C16.239 6.67969 16.3034 6.70469 16.3509 6.74919C16.3983 6.7937 16.425 6.85405 16.425 6.91699V7.70801ZM16.425 4.96582C16.425 5.02876 16.3983 5.08912 16.3509 5.13362C16.3034 5.17812 16.239 5.20312 16.1719 5.20312H15.3281C15.261 5.20312 15.1966 5.17812 15.1491 5.13362C15.1017 5.08912 15.075 5.02876 15.075 4.96582V4.1748C15.075 4.11187 15.1017 4.05151 15.1491 4.007C15.1966 3.9625 15.261 3.9375 15.3281 3.9375H16.1719C16.239 3.9375 16.3034 3.9625 16.3509 4.007C16.3983 4.05151 16.425 4.11187 16.425 4.1748V4.96582ZM11.7 6.46875H0.9C0.661305 6.46875 0.432387 6.55764 0.263604 6.71588C0.0948212 6.87411 0 7.08872 0 7.3125L0 14.9062C0 15.13 0.0948212 15.3446 0.263604 15.5029C0.432387 15.6611 0.661305 15.75 0.9 15.75H11.7C11.9387 15.75 12.1676 15.6611 12.3364 15.5029C12.5052 15.3446 12.6 15.13 12.6 14.9062V7.3125C12.6 7.08872 12.5052 6.87411 12.3364 6.71588C12.1676 6.55764 11.9387 6.46875 11.7 6.46875ZM2.7 8.15625C2.878 8.15625 3.05201 8.20574 3.20001 8.29845C3.34802 8.39116 3.46337 8.52294 3.53149 8.67711C3.59961 8.83129 3.61743 9.00094 3.58271 9.16461C3.54798 9.32828 3.46226 9.47862 3.3364 9.59662C3.21053 9.71462 3.05016 9.79498 2.87558 9.82754C2.701 9.86009 2.52004 9.84338 2.35558 9.77952C2.19113 9.71566 2.05057 9.60752 1.95168 9.46876C1.85278 9.33001 1.8 9.16688 1.8 9C1.8 8.77622 1.89482 8.56161 2.0636 8.40338C2.23239 8.24514 2.46131 8.15625 2.7 8.15625ZM10.8 14.0625H1.8V13.2188L3.6 11.5312L4.5 12.375L8.1 9L10.8 11.5312V14.0625Z"/></svg>
      </div>
      <div>Media Manager</div>
      </router-link>

    <div class="font-semibold mx-3 mb-2 pt-2 text-gray-300 text-xs tracking-widest uppercase mb-2">Resources</div>

    @foreach(\SertxuDeveloper\Lyra\Sidebar::items() as $item)
      <router-link :to="{ name: 'resourceIndex', params: { resourceName: '{{ $item['slug'] }}' } }">
        @if($item['icon'])
          <div class="opacity-70 mr-3">{!! $item['icon'] !!}</div>
        @endif
        <div>{{ $item['name'] }}</div>
      </router-link>
    @endforeach

  </div>
</div>
