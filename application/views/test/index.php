<?php
$resultb = <<<EOM
      <SOAP:Envelope xmlns:SOAP="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP:Body>
        <air:LowFareSearchRsp TraceId="STKrWQeGkpfAeZRfTgFAg43gm" TransactionId="74818B130A07643C15CFCAC367B37E5C" ResponseTime="3702" DistanceUnits="MI" CurrencyType="AUD" xmlns:air="http://www.travelport.com/schema/air_v26_0" xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0">
            <air:FlightDetailsList>
                <air:FlightDetails Key="Uwgs5Tr/Q7ydbn0npAtBPg==" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T06:35:00.000+01:00" ArrivalTime="2014-11-09T08:40:00.000+01:00" FlightTime="125" TravelTime="125" Distance="681" Equipment="319" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="fhMjuVelSjCm3MWBU8Cjmg==" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T08:00:00.000+01:00" ArrivalTime="2014-11-10T10:00:00.000+01:00" FlightTime="120" TravelTime="120" Distance="681" Equipment="320" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="HR9a/YfzQKaknoH/OeqZSQ==" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T08:55:00.000+01:00" ArrivalTime="2014-11-09T11:00:00.000+01:00" FlightTime="125" TravelTime="125" Distance="681" Equipment="321" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="mJcY5MStRKG33VnY9xEKwA==" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T09:20:00.000+01:00" ArrivalTime="2014-11-10T11:20:00.000+01:00" FlightTime="120" TravelTime="120" Distance="681" Equipment="320" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="aqEhmijaRH+1nWoXjHyLWA==" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T15:35:00.000+01:00" ArrivalTime="2014-11-09T17:40:00.000+01:00" FlightTime="125" TravelTime="125" Distance="681" Equipment="321" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="4hOXskBjQhSRIEqWI7mh6w==" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T19:15:00.000+01:00" ArrivalTime="2014-11-09T21:20:00.000+01:00" FlightTime="125" TravelTime="125" Distance="681" Equipment="320" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="PVj8jDjmT+aafjH7DQnRwA==" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T15:35:00.000+01:00" ArrivalTime="2014-11-10T17:35:00.000+01:00" FlightTime="120" TravelTime="120" Distance="681" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="4C86QmJJShiWr1FAwbEsJg==" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T18:45:00.000+01:00" ArrivalTime="2014-11-10T20:45:00.000+01:00" FlightTime="120" TravelTime="120" Distance="681" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="iEDwfqueT42ZECR/EFSDMw==" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T12:25:00.000+01:00" ArrivalTime="2014-11-09T14:30:00.000+01:00" FlightTime="125" TravelTime="125" Distance="681" Equipment="320" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="AWNnj/LvQMiwewcamlPqyg==" Origin="MUC" Destination="DUS" DepartureTime="2014-11-09T14:30:00.000+01:00" ArrivalTime="2014-11-09T15:40:00.000+01:00" FlightTime="70" TravelTime="70" Distance="303" Equipment="320" OriginTerminal="2"/>
                <air:FlightDetails Key="BqiNS63YST2zV0yiwCvk3Q==" Origin="DUS" Destination="BCN" DepartureTime="2014-11-09T16:35:00.000+01:00" ArrivalTime="2014-11-09T18:45:00.000+01:00" FlightTime="130" TravelTime="185" Distance="724" Equipment="320" DestinationTerminal="2"/>
                <air:FlightDetails Key="C5KCeHU/RgStu7wfKrUIfg==" Origin="MUC" Destination="DUS" DepartureTime="2014-11-09T11:20:00.000+01:00" ArrivalTime="2014-11-09T12:30:00.000+01:00" FlightTime="70" TravelTime="70" Distance="303" Equipment="320" OriginTerminal="2"/>
                <air:FlightDetails Key="Gt2vse2JSiOIrM8d4JsWww==" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T16:10:00.000+01:00" ArrivalTime="2014-11-10T18:25:00.000+01:00" FlightTime="135" TravelTime="135" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="hB7qrkTmTwKhDx+dkwdVXQ==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T19:15:00.000+01:00" ArrivalTime="2014-11-10T20:15:00.000+01:00" FlightTime="60" TravelTime="110" Distance="186" Equipment="320" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="eBWE9p4wSdKBbgpJcP19WQ==" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T06:05:00.000+01:00" ArrivalTime="2014-11-10T08:25:00.000+01:00" FlightTime="140" TravelTime="140" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="oDmIdK3fSxiDINsSnmsxQA==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T09:15:00.000+01:00" ArrivalTime="2014-11-10T10:15:00.000+01:00" FlightTime="60" TravelTime="110" Distance="186" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="Rmqv2rMvTh+G9z5rDn0xLA==" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T14:40:00.000+01:00" ArrivalTime="2014-11-10T16:55:00.000+01:00" FlightTime="135" TravelTime="135" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="TMN5sTXyQhmis4hYm9AG/g==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T18:15:00.000+01:00" ArrivalTime="2014-11-10T19:15:00.000+01:00" FlightTime="60" TravelTime="140" Distance="186" Equipment="319" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="SeYut26DTK2gPwZ1WF+lQA==" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T09:30:00.000+01:00" ArrivalTime="2014-11-10T11:50:00.000+01:00" FlightTime="140" TravelTime="140" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="YvBcCoyfTveLmjDYPUCNLQ==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T13:15:00.000+01:00" ArrivalTime="2014-11-10T14:15:00.000+01:00" FlightTime="60" TravelTime="145" Distance="186" Equipment="320" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="JA9ISvnaS3ayqv1qabwVcw==" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T13:30:00.000+01:00" ArrivalTime="2014-11-10T15:45:00.000+01:00" FlightTime="135" TravelTime="135" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="TxjyPbvdS6eWvmrYkF8CmA==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T17:15:00.000+01:00" ArrivalTime="2014-11-10T18:15:00.000+01:00" FlightTime="60" TravelTime="150" Distance="186" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="q9TyKF30Qn+JaLWWQZofkw==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T10:00:00.000+01:00" ArrivalTime="2014-11-09T11:10:00.000+01:00" FlightTime="70" TravelTime="70" Distance="186" Equipment="321" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="10GuuQg1TYS+81L9wyVAYA==" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T11:55:00.000+01:00" ArrivalTime="2014-11-09T13:55:00.000+01:00" FlightTime="120" TravelTime="165" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="GPT30XZrRUaYLxFdAPIsiA==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T14:00:00.000+01:00" ArrivalTime="2014-11-09T15:05:00.000+01:00" FlightTime="65" TravelTime="65" Distance="186" Equipment="321" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="PblMGm6ZSNaWKG9uK+cfow==" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T16:05:00.000+01:00" ArrivalTime="2014-11-09T18:05:00.000+01:00" FlightTime="120" TravelTime="180" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="MLfgLfT5SpWNuIrECNgkRw==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T08:00:00.000+01:00" ArrivalTime="2014-11-09T09:10:00.000+01:00" FlightTime="70" TravelTime="70" Distance="186" Equipment="319" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="xhZ51VB4QvyDG6OfrQBEkA==" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T10:10:00.000+01:00" ArrivalTime="2014-11-09T12:10:00.000+01:00" FlightTime="120" TravelTime="180" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="F+pB9G1sSnmXaW+E6OEzGQ==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T19:00:00.000+01:00" ArrivalTime="2014-11-09T20:05:00.000+01:00" FlightTime="65" TravelTime="65" Distance="186" Equipment="321" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="DAWJBHY5T96h1dV+p3vWDA==" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T21:20:00.000+01:00" ArrivalTime="2014-11-09T23:20:00.000+01:00" FlightTime="120" TravelTime="195" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="nEi7pYIES7mW21RBsK0bWQ==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T15:00:00.000+01:00" ArrivalTime="2014-11-09T16:05:00.000+01:00" FlightTime="65" TravelTime="65" Distance="186" Equipment="320" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="5AS1NOWfSzOn2xN6SHlG1Q==" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T17:40:00.000+01:00" ArrivalTime="2014-11-09T19:40:00.000+01:00" FlightTime="120" TravelTime="215" Distance="679" Equipment="320" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="dIbTCfuOTLa3KmCInWF/fA==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T09:00:00.000+01:00" ArrivalTime="2014-11-09T10:10:00.000+01:00" FlightTime="70" TravelTime="70" Distance="186" Equipment="320" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="bDCbXeVASqS/NLnVB2i2OA==" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T12:55:00.000+01:00" ArrivalTime="2014-11-09T14:55:00.000+01:00" FlightTime="120" TravelTime="225" Distance="679" Equipment="321" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="l252BagZSV+I8dQgSeIuzw==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T07:00:00.000+01:00" ArrivalTime="2014-11-09T08:10:00.000+01:00" FlightTime="70" TravelTime="70" Distance="186" Equipment="321" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="GHEpFT81S1KouYx/Pqe29w==" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T18:00:00.000+01:00" ArrivalTime="2014-11-09T19:05:00.000+01:00" FlightTime="65" TravelTime="65" Distance="186" Equipment="320" OriginTerminal="2" DestinationTerminal="1"/>
                <air:FlightDetails Key="4j6Ql3/3QAyQPFDWbSoJ7Q==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T20:15:00.000+01:00" ArrivalTime="2014-11-10T21:15:00.000+01:00" FlightTime="60" TravelTime="170" Distance="186" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="n/hvMDJIRUGfDsldHClOFQ==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T10:15:00.000+01:00" ArrivalTime="2014-11-10T11:15:00.000+01:00" FlightTime="60" TravelTime="170" Distance="186" Equipment="319" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="cOrycx4ySn+mBZl3bCQdpQ==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T14:15:00.000+01:00" ArrivalTime="2014-11-10T15:15:00.000+01:00" FlightTime="60" TravelTime="205" Distance="186" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="GT5FiYHaTb6v8Rvppt+GZw==" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T07:15:00.000+01:00" ArrivalTime="2014-11-10T09:35:00.000+01:00" FlightTime="140" TravelTime="140" Distance="679" Equipment="320" OriginTerminal="1" DestinationTerminal="1"/>
                <air:FlightDetails Key="V+gU8tjOR4uPTDIfZ0kHgA==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T12:15:00.000+01:00" ArrivalTime="2014-11-10T13:15:00.000+01:00" FlightTime="60" TravelTime="220" Distance="186" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="pJg+G1dxRQqQt2H321gKzw==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T21:15:00.000+01:00" ArrivalTime="2014-11-10T22:15:00.000+01:00" FlightTime="60" TravelTime="230" Distance="186" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="MN/Wze/8Tp6MOPas2xF+FQ==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T15:15:00.000+01:00" ArrivalTime="2014-11-10T16:15:00.000+01:00" FlightTime="60" TravelTime="265" Distance="186" Equipment="320" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="4pZrkbBCSw66S92vkEQg6g==" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T16:15:00.000+01:00" ArrivalTime="2014-11-10T17:15:00.000+01:00" FlightTime="60" TravelTime="325" Distance="186" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
                <air:FlightDetails Key="XXWq6ozKQUmA6zxGjA4R+A==" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T11:45:00.000+01:00" ArrivalTime="2014-11-10T13:45:00.000+01:00" FlightTime="120" TravelTime="120" Distance="681" Equipment="321" OriginTerminal="1" DestinationTerminal="2"/>
            </air:FlightDetailsList>
            <air:AirSegmentList>
                <air:AirSegment Key="fpdQYAEHQNS2IxkoG1MpQw==" Group="0" Carrier="LH" FlightNumber="1808" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T06:35:00.000+01:00" ArrivalTime="2014-11-09T08:40:00.000+01:00" FlightTime="125" Distance="681" ETicketability="Yes" Equipment="319" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="T9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="Uwgs5Tr/Q7ydbn0npAtBPg=="/>
                </air:AirSegment>
                <air:AirSegment Key="zT4W9eWDSBK2eLfr3VLIYQ==" Group="1" Carrier="LH" FlightNumber="1817" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T08:00:00.000+01:00" ArrivalTime="2014-11-10T10:00:00.000+01:00" FlightTime="120" Distance="681" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="T9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="fhMjuVelSjCm3MWBU8Cjmg=="/>
                </air:AirSegment>
                <air:AirSegment Key="PQaDiZw3Q5yc7mB/10xXYg==" Group="0" Carrier="LH" FlightNumber="1810" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T08:55:00.000+01:00" ArrivalTime="2014-11-09T11:00:00.000+01:00" FlightTime="125" Distance="681" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="T9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="HR9a/YfzQKaknoH/OeqZSQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="tepm1TpTQtStK+zKD9emgA==" Group="1" Carrier="LH" FlightNumber="1809" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T09:20:00.000+01:00" ArrivalTime="2014-11-10T11:20:00.000+01:00" FlightTime="120" Distance="681" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="T9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="mJcY5MStRKG33VnY9xEKwA=="/>
                </air:AirSegment>
                <air:AirSegment Key="pmd7ajJESoqWZP4S1+lcEw==" Group="0" Carrier="LH" FlightNumber="1814" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T15:35:00.000+01:00" ArrivalTime="2014-11-09T17:40:00.000+01:00" FlightTime="125" Distance="681" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="T9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="aqEhmijaRH+1nWoXjHyLWA=="/>
                </air:AirSegment>
                <air:AirSegment Key="NjV+t7AyQxO5Hta7CMhZsA==" Group="0" Carrier="LH" FlightNumber="1816" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T19:15:00.000+01:00" ArrivalTime="2014-11-09T21:20:00.000+01:00" FlightTime="125" Distance="681" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="T2"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="4hOXskBjQhSRIEqWI7mh6w=="/>
                </air:AirSegment>
                <air:AirSegment Key="rB6qpxi+SbqVd+iW4Exsxg==" Group="1" Carrier="LH" FlightNumber="1813" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T15:35:00.000+01:00" ArrivalTime="2014-11-10T17:35:00.000+01:00" FlightTime="120" Distance="681" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S7"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="PVj8jDjmT+aafjH7DQnRwA=="/>
                </air:AirSegment>
                <air:AirSegment Key="5+6i/4EUR/a/CaglJJ6PAQ==" Group="1" Carrier="LH" FlightNumber="1815" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T18:45:00.000+01:00" ArrivalTime="2014-11-10T20:45:00.000+01:00" FlightTime="120" Distance="681" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="4C86QmJJShiWr1FAwbEsJg=="/>
                </air:AirSegment>
                <air:AirSegment Key="JjDNkARoTdqCCgGqOnPk4g==" Group="0" Carrier="LH" FlightNumber="1812" Origin="MUC" Destination="BCN" DepartureTime="2014-11-09T12:25:00.000+01:00" ArrivalTime="2014-11-09T14:30:00.000+01:00" FlightTime="125" Distance="681" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="iEDwfqueT42ZECR/EFSDMw=="/>
                </air:AirSegment>
                <air:AirSegment Key="nHqIHStzSeeTrNmwKxKtaA==" Group="0" Carrier="LH" FlightNumber="2012" Origin="MUC" Destination="DUS" DepartureTime="2014-11-09T14:30:00.000+01:00" ArrivalTime="2014-11-09T15:40:00.000+01:00" FlightTime="70" Distance="303" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="AWNnj/LvQMiwewcamlPqyg=="/>
                </air:AirSegment>
                <air:AirSegment Key="SxA5vEP6S4SsFW/xg/Llyw==" Group="0" Carrier="LH" FlightNumber="5072" Origin="DUS" Destination="BCN" DepartureTime="2014-11-09T16:35:00.000+01:00" ArrivalTime="2014-11-09T18:45:00.000+01:00" FlightTime="130" Distance="724" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <common_v26_0:SegmentRemark Key="vP7DCdkBTH2jwuN5yWZ4dQ==">   LH  5072 GERMANWINGS</common_v26_0:SegmentRemark>
                    <air:CodeshareInfo OperatingCarrier="4U" OperatingFlightNumber="9528">4U9528</air:CodeshareInfo>
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S4"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="BqiNS63YST2zV0yiwCvk3Q=="/>
                </air:AirSegment>
                <air:AirSegment Key="Cte40hmXQKGoDZ7cb/HElQ==" Group="0" Carrier="LH" FlightNumber="2010" Origin="MUC" Destination="DUS" DepartureTime="2014-11-09T11:20:00.000+01:00" ArrivalTime="2014-11-09T12:30:00.000+01:00" FlightTime="70" Distance="303" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="C5KCeHU/RgStu7wfKrUIfg=="/>
                </air:AirSegment>
                <air:AirSegment Key="ZhmvEtz7QBCY02d9hW1t7A==" Group="1" Carrier="LH" FlightNumber="1129" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T16:10:00.000+01:00" ArrivalTime="2014-11-10T18:25:00.000+01:00" FlightTime="135" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="Gt2vse2JSiOIrM8d4JsWww=="/>
                </air:AirSegment>
                <air:AirSegment Key="1XdRzBCDS3SPCY9mPjJ7wQ==" Group="1" Carrier="LH" FlightNumber="118" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T19:15:00.000+01:00" ArrivalTime="2014-11-10T20:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="hB7qrkTmTwKhDx+dkwdVXQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="lR/WkEQ4Q5ypZ/F5nMDYDQ==" Group="1" Carrier="LH" FlightNumber="1139" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T06:05:00.000+01:00" ArrivalTime="2014-11-10T08:25:00.000+01:00" FlightTime="140" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="eBWE9p4wSdKBbgpJcP19WQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="5NhUhZv+QOWcwMbLNbuhqQ==" Group="1" Carrier="LH" FlightNumber="98" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T09:15:00.000+01:00" ArrivalTime="2014-11-10T10:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="oDmIdK3fSxiDINsSnmsxQA=="/>
                </air:AirSegment>
                <air:AirSegment Key="9/nEsqgtTxyz6UcynQWL/A==" Group="1" Carrier="LH" FlightNumber="1131" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T14:40:00.000+01:00" ArrivalTime="2014-11-10T16:55:00.000+01:00" FlightTime="135" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="Rmqv2rMvTh+G9z5rDn0xLA=="/>
                </air:AirSegment>
                <air:AirSegment Key="r5OiIbWURiO7ia6rwWC0FA==" Group="1" Carrier="LH" FlightNumber="116" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T18:15:00.000+01:00" ArrivalTime="2014-11-10T19:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="319" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="TMN5sTXyQhmis4hYm9AG/g=="/>
                </air:AirSegment>
                <air:AirSegment Key="yoihV95CSrKpQ+f8eOR+tA==" Group="1" Carrier="LH" FlightNumber="1125" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T09:30:00.000+01:00" ArrivalTime="2014-11-10T11:50:00.000+01:00" FlightTime="140" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="SeYut26DTK2gPwZ1WF+lQA=="/>
                </air:AirSegment>
                <air:AirSegment Key="9JK9S2wWQfCwUiSi33ap/Q==" Group="1" Carrier="LH" FlightNumber="106" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T13:15:00.000+01:00" ArrivalTime="2014-11-10T14:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="YvBcCoyfTveLmjDYPUCNLQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="8pN92PpIT8aIMk7m/vx5kg==" Group="1" Carrier="LH" FlightNumber="1127" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T13:30:00.000+01:00" ArrivalTime="2014-11-10T15:45:00.000+01:00" FlightTime="135" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="JA9ISvnaS3ayqv1qabwVcw=="/>
                </air:AirSegment>
                <air:AirSegment Key="imT9JQ8JQsS8P6zyFPdfXg==" Group="1" Carrier="LH" FlightNumber="114" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T17:15:00.000+01:00" ArrivalTime="2014-11-10T18:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="TxjyPbvdS6eWvmrYkF8CmA=="/>
                </air:AirSegment>
                <air:AirSegment Key="TqhfoG8OTkCovr5ZpOB+3Q==" Group="0" Carrier="LH" FlightNumber="101" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T10:00:00.000+01:00" ArrivalTime="2014-11-09T11:10:00.000+01:00" FlightTime="70" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="q9TyKF30Qn+JaLWWQZofkw=="/>
                </air:AirSegment>
                <air:AirSegment Key="355Hp5j8S6K50XrJtKw8Xg==" Group="0" Carrier="LH" FlightNumber="1130" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T11:55:00.000+01:00" ArrivalTime="2014-11-09T13:55:00.000+01:00" FlightTime="120" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="10GuuQg1TYS+81L9wyVAYA=="/>
                </air:AirSegment>
                <air:AirSegment Key="Su5YXkmfTMKy9tv1yW4dHg==" Group="0" Carrier="LH" FlightNumber="109" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T14:00:00.000+01:00" ArrivalTime="2014-11-09T15:05:00.000+01:00" FlightTime="65" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="GPT30XZrRUaYLxFdAPIsiA=="/>
                </air:AirSegment>
                <air:AirSegment Key="nbtt/WzlQzelHwku9IC6RQ==" Group="0" Carrier="LH" FlightNumber="1132" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T16:05:00.000+01:00" ArrivalTime="2014-11-09T18:05:00.000+01:00" FlightTime="120" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="PblMGm6ZSNaWKG9uK+cfow=="/>
                </air:AirSegment>
                <air:AirSegment Key="rSB8RXP8SS2e2QjJxXmJ5w==" Group="0" Carrier="LH" FlightNumber="95" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T08:00:00.000+01:00" ArrivalTime="2014-11-09T09:10:00.000+01:00" FlightTime="70" Distance="186" ETicketability="Yes" Equipment="319" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="MLfgLfT5SpWNuIrECNgkRw=="/>
                </air:AirSegment>
                <air:AirSegment Key="LwlLk/zoTDeZXfNXGthq/w==" Group="0" Carrier="LH" FlightNumber="1126" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T10:10:00.000+01:00" ArrivalTime="2014-11-09T12:10:00.000+01:00" FlightTime="120" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="xhZ51VB4QvyDG6OfrQBEkA=="/>
                </air:AirSegment>
                <air:AirSegment Key="GHe+AGw6QouHVx/z/OCQcg==" Group="0" Carrier="LH" FlightNumber="119" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T19:00:00.000+01:00" ArrivalTime="2014-11-09T20:05:00.000+01:00" FlightTime="65" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="F+pB9G1sSnmXaW+E6OEzGQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="S0C4lyciTySTL9S/soE8uQ==" Group="0" Carrier="LH" FlightNumber="1138" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T21:20:00.000+01:00" ArrivalTime="2014-11-09T23:20:00.000+01:00" FlightTime="120" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="DAWJBHY5T96h1dV+p3vWDA=="/>
                </air:AirSegment>
                <air:AirSegment Key="JvgIQZpcQbiktjpQFThxaw==" Group="0" Carrier="LH" FlightNumber="111" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T15:00:00.000+01:00" ArrivalTime="2014-11-09T16:05:00.000+01:00" FlightTime="65" Distance="186" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="nEi7pYIES7mW21RBsK0bWQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="B2uwJetNRbqYZJ4U/GbO6Q==" Group="0" Carrier="LH" FlightNumber="1134" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T17:40:00.000+01:00" ArrivalTime="2014-11-09T19:40:00.000+01:00" FlightTime="120" Distance="679" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="5AS1NOWfSzOn2xN6SHlG1Q=="/>
                </air:AirSegment>
                <air:AirSegment Key="P1QUPVFGTIW4wlxeoo+0Fw==" Group="0" Carrier="LH" FlightNumber="99" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T09:00:00.000+01:00" ArrivalTime="2014-11-09T10:10:00.000+01:00" FlightTime="70" Distance="186" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="dIbTCfuOTLa3KmCInWF/fA=="/>
                </air:AirSegment>
                <air:AirSegment Key="1HBZHp8nRr+3A85fANwnRQ==" Group="0" Carrier="LH" FlightNumber="1128" Origin="FRA" Destination="BCN" DepartureTime="2014-11-09T12:55:00.000+01:00" ArrivalTime="2014-11-09T14:55:00.000+01:00" FlightTime="120" Distance="679" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="bDCbXeVASqS/NLnVB2i2OA=="/>
                </air:AirSegment>
                <air:AirSegment Key="RQyVi/GpTlyWYn7E67ASaA==" Group="0" Carrier="LH" FlightNumber="93" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T07:00:00.000+01:00" ArrivalTime="2014-11-09T08:10:00.000+01:00" FlightTime="70" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="l252BagZSV+I8dQgSeIuzw=="/>
                </air:AirSegment>
                <air:AirSegment Key="ti7BM8fTT6WGBc4+GxzmPg==" Group="0" Carrier="LH" FlightNumber="117" Origin="MUC" Destination="FRA" DepartureTime="2014-11-09T18:00:00.000+01:00" ArrivalTime="2014-11-09T19:05:00.000+01:00" FlightTime="65" Distance="186" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="GHEpFT81S1KouYx/Pqe29w=="/>
                </air:AirSegment>
                <air:AirSegment Key="wLMFFwqEQiu6CkAnUv8eAw==" Group="1" Carrier="LH" FlightNumber="120" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T20:15:00.000+01:00" ArrivalTime="2014-11-10T21:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="4j6Ql3/3QAyQPFDWbSoJ7Q=="/>
                </air:AirSegment>
                <air:AirSegment Key="ZFPnJuvcQKe/OGHrjNwT3A==" Group="1" Carrier="LH" FlightNumber="100" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T10:15:00.000+01:00" ArrivalTime="2014-11-10T11:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="319" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="n/hvMDJIRUGfDsldHClOFQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="BEmrbNOoQbCDG/GOZChssg==" Group="1" Carrier="LH" FlightNumber="108" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T14:15:00.000+01:00" ArrivalTime="2014-11-10T15:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="cOrycx4ySn+mBZl3bCQdpQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="swXDM1EGRLqHibO57RMxUQ==" Group="1" Carrier="LH" FlightNumber="1137" Origin="BCN" Destination="FRA" DepartureTime="2014-11-10T07:15:00.000+01:00" ArrivalTime="2014-11-10T09:35:00.000+01:00" FlightTime="140" Distance="679" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="GT5FiYHaTb6v8Rvppt+GZw=="/>
                </air:AirSegment>
                <air:AirSegment Key="P+YAEe2rQK+MslSihk6ejg==" Group="1" Carrier="LH" FlightNumber="104" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T12:15:00.000+01:00" ArrivalTime="2014-11-10T13:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="V+gU8tjOR4uPTDIfZ0kHgA=="/>
                </air:AirSegment>
                <air:AirSegment Key="E6Pcr2dMSq+TKd4bklCTVw==" Group="1" Carrier="LH" FlightNumber="122" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T21:15:00.000+01:00" ArrivalTime="2014-11-10T22:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="pJg+G1dxRQqQt2H321gKzw=="/>
                </air:AirSegment>
                <air:AirSegment Key="Qy+2nJz/RMWOyFrQs8M+5Q==" Group="1" Carrier="LH" FlightNumber="110" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T15:15:00.000+01:00" ArrivalTime="2014-11-10T16:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="MN/Wze/8Tp6MOPas2xF+FQ=="/>
                </air:AirSegment>
                <air:AirSegment Key="lLv0BMvtTDiLWH/CGLZvTA==" Group="1" Carrier="LH" FlightNumber="112" Origin="FRA" Destination="MUC" DepartureTime="2014-11-10T16:15:00.000+01:00" ArrivalTime="2014-11-10T17:15:00.000+01:00" FlightTime="60" Distance="186" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="S9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="4pZrkbBCSw66S92vkEQg6g=="/>
                </air:AirSegment>
                <air:AirSegment Key="8W7yDpEbRfm+rhX4jT6Z6g==" Group="1" Carrier="LH" FlightNumber="1811" Origin="BCN" Destination="MUC" DepartureTime="2014-11-10T11:45:00.000+01:00" ArrivalTime="2014-11-10T13:45:00.000+01:00" FlightTime="120" Distance="681" ETicketability="Yes" Equipment="321" ChangeOfPlane="false" ParticipantLevel="Airline Source" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
                    <air:AirAvailInfo ProviderCode="1P">
                        <air:BookingCodeInfo BookingCounts="Q9"/>
                    </air:AirAvailInfo>
                    <air:FlightDetailsRef Key="XXWq6ozKQUmA6zxGjA4R+A=="/>
                </air:AirSegment>
            </air:AirSegmentList>
            <air:FareInfoList>
                <air:FareInfo Key="vJ9DP4ZmSmqIKCOmYf8y3Q==" FareBasis="TNN293D1" PassengerTypeCode="ADT" Origin="MUC" Destination="BCN" EffectiveDate="2014-11-03T07:14:50.000+00:00" DepartureDate="2014-11-09" Amount="AUD77.00">
                    <air:FareRuleKey FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" ProviderCode="1P">YwAMB5BAk2FkDS1iqXO3zuzPVo6Wr4JPnlQ7vqNDAOw1ERKGdzosH2z0sHHqbaIraV3PHmLJy/G7JhhsKZwR3VknrNLcq1Po</air:FareRuleKey>
                </air:FareInfo>
                <air:FareInfo Key="Q2l7/1cmRmq6hOzHM4kH9Q==" FareBasis="TNN293D1" PassengerTypeCode="ADT" Origin="BCN" Destination="MUC" EffectiveDate="2014-11-03T07:14:50.000+00:00" DepartureDate="2014-11-10" Amount="AUD77.00">
                    <air:FareRuleKey FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" ProviderCode="1P">YwAMB5BAk2FkDS1iqXO3zuzPVo6Wr4JPOXAphvAgT4Zr+HqSqSp5UkjfguohaU99JAepv7yXJEm7JhhsKZwR3VknrNLcq1Po</air:FareRuleKey>
                </air:FareInfo>
                <air:FareInfo Key="9hlay8dYQyCQ2i94wS8stg==" FareBasis="SNC293D0" PassengerTypeCode="ADT" Origin="BCN" Destination="MUC" EffectiveDate="2014-11-03T07:14:50.000+00:00" DepartureDate="2014-11-10" Amount="AUD109.00">
                    <air:FareRuleKey FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" ProviderCode="1P">ONSwCVL91em1OitqDIQtQuzPVo6Wr4JPOXAphvAgT4Zr+HqSqSp5UkjfguohaU99JAepv7yXJEm7JhhsKZwR3VknrNLcq1Po</air:FareRuleKey>
                </air:FareInfo>
                <air:FareInfo Key="vlCgGiAKSDCaOzvRGKbhcA==" FareBasis="SNC293D0" PassengerTypeCode="ADT" Origin="MUC" Destination="BCN" EffectiveDate="2014-11-03T07:14:50.000+00:00" DepartureDate="2014-11-09" Amount="AUD109.00">
                    <air:FareRuleKey FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" ProviderCode="1P">ONSwCVL91em1OitqDIQtQuzPVo6Wr4JPnlQ7vqNDAOw1ERKGdzosH2z0sHHqbaIraV3PHmLJy/G7JhhsKZwR3VknrNLcq1Po</air:FareRuleKey>
                </air:FareInfo>
                <air:FareInfo Key="tMJljYi6Trenck7JxzAT4A==" FareBasis="QNC453D0" PassengerTypeCode="ADT" Origin="BCN" Destination="MUC" EffectiveDate="2014-11-03T07:14:50.000+00:00" DepartureDate="2014-11-10" Amount="AUD238.00">
                    <air:FareRuleKey FareInfoRef="tMJljYi6Trenck7JxzAT4A==" ProviderCode="1P">FXGKnDCFmcS1OitqDIQtQuzPVo6Wr4JPOXAphvAgT4Zr+HqSqSp5UkjfguohaU99JAepv7yXJEm7JhhsKZwR3VknrNLcq1Po</air:FareRuleKey>
                </air:FareInfo>
            </air:FareInfoList>
            <air:RouteList>
                <air:Route Key="MdH8U52tTj2bS8tPFAzBFQ==">
                    <air:Leg Key="WIRsoYzxQ6CxC2ybzv/U4g==" Group="0" Origin="MUC" Destination="BCN"/>
                    <air:Leg Key="GSeo8Zy/TcSN0pQyJ6BSQA==" Group="1" Origin="BCN" Destination="MUC"/>
                </air:Route>
            </air:RouteList>
            <air:AirPricingSolution Key="PnrZvhyFSUC3uI+x5kcv6Q==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="RQVVnWYBS7SiPf0HDG0Urg==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="pz01RzOzQ2KZRt7JvGcKIA==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="bo7r1X8IRUGrvp1xjGIHaw==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="R1ptAV5fQsiR/xR5K2z6ag==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="4hpu4jTaQpqdpnX51EE6MA==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="c7CKRqaWRbWes2qD+DgRVQ==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="W7h/KtEaRVmmyzPmA79smQ==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="tRUCWgi3R8efvP4dIH6aVA==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="Qn6EIzDATwWWRcYybi8bgA==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="MSJExthpSdKmwYaGDSE7sw==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="gEXqRUzMS3ilW1tMWuyQXA==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="5KT69z08RHCtOhXXoJ/6JQ==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="fo9Mo+iZQUqfinnLYQTd4g==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="24fJR3nkTGiRm7qM212+LA==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" ApproximateTaxes="AUD150.70">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="SbiWVqS1TpyDNt3FbvvHBw==" TotalPrice="AUD304.70" BasePrice="AUD154.00" ApproximateTotalPrice="AUD304.70" ApproximateBasePrice="AUD154.00" Taxes="AUD150.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD70.60"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="VkKwZsX1S9yGVXYZOzZgIA==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="rB6qpxi+SbqVd+iW4Exsxg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="kt57se/QS8qWi3rfFBX3/w==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="rB6qpxi+SbqVd+iW4Exsxg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Bz6J6PjiQauFq/mWrBn7Lw==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="kguN0XvKQuSwDu4n21pYxg==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="yXeCh7okQkO5kQIRZVaxBQ==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="yORrrQaYRDaNXskJ7QHtDA==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="CbSFLxQxST6Q4V7U99ejTQ==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="rB6qpxi+SbqVd+iW4Exsxg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="rXpltmFtTnqGSTio+J0I2g==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="rB6qpxi+SbqVd+iW4Exsxg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="jVOXn859Q7if+HoaVV10QQ==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="rB6qpxi+SbqVd+iW4Exsxg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="15IA0OScRviyJMk8YdDKug==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="rB6qpxi+SbqVd+iW4Exsxg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="6Fvy1PmKQ/iuN6eoajz2MA==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="U0j4KDQiSD2IMr/9gh/rUA==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="2NYZUavYQ7e1GfJcTi5o9g==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="rB6qpxi+SbqVd+iW4Exsxg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="8Bm1dlYnTHa72iKzVt6Qvw==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="rB6qpxi+SbqVd+iW4Exsxg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="OW6epy3zSCKUFYR7PKsTeQ==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="oLxNOCu0Q/6Q+W+d8eKduw==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="GLkOjRT1RL6wWi3nltB/zQ==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="gkJ4x2znR9e5VzPje+4vdw==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="5DSNKzlQSO+xkpxIsubfRA==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" ApproximateTaxes="AUD156.90">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="iJSSUYqmQRuKR5crvReFtQ==" TotalPrice="AUD342.90" BasePrice="AUD186.00" ApproximateTotalPrice="AUD342.90" ApproximateBasePrice="AUD186.00" Taxes="AUD156.90" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD76.80"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Jz0UK6BBQBSkUCEZ+THnwA==" TotalPrice="AUD381.10" BasePrice="AUD218.00" ApproximateTotalPrice="AUD381.10" ApproximateBasePrice="AUD218.00" Taxes="AUD163.10" ApproximateTaxes="AUD163.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="rB6qpxi+SbqVd+iW4Exsxg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="AsBbrAgESFyVrsG5cfqxWQ==" TotalPrice="AUD381.10" BasePrice="AUD218.00" ApproximateTotalPrice="AUD381.10" ApproximateBasePrice="AUD218.00" Taxes="AUD163.10" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="rB6qpxi+SbqVd+iW4Exsxg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD83.00"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="cjcviBv1RTWJoerSsI10zw==" TotalPrice="AUD381.10" BasePrice="AUD218.00" ApproximateTotalPrice="AUD381.10" ApproximateBasePrice="AUD218.00" Taxes="AUD163.10" ApproximateTaxes="AUD163.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="/gRfylB4S6OorI1xA0vBog==" TotalPrice="AUD381.10" BasePrice="AUD218.00" ApproximateTotalPrice="AUD381.10" ApproximateBasePrice="AUD218.00" Taxes="AUD163.10" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD83.00"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="8ECx7USpTCKpoQuNVOqpew==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" ApproximateTaxes="AUD214.70">
                <air:Journey TravelTime="P0DT4H15M0S">
                    <air:AirSegmentRef Key="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="pkNfdgkZQ4WJ2yLaHlMRhg==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="8KyVF/NsS428l7C55f5ufQ==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" ApproximateTaxes="AUD214.70">
                <air:Journey TravelTime="P0DT7H25M0S">
                    <air:AirSegmentRef Key="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="VaRgg7jhROyOHw9i/IkXug==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Z1f4Lmt3RgG+CCQZIkU+7Q==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" ApproximateTaxes="AUD214.70">
                <air:Journey TravelTime="P0DT4H15M0S">
                    <air:AirSegmentRef Key="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="SdcCQBZURsSuGTJv2lemPQ==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="rqf1cyQHSJ63z1p9CKVAIw==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" ApproximateTaxes="AUD214.70">
                <air:Journey TravelTime="P0DT7H25M0S">
                    <air:AirSegmentRef Key="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="h/wmt7UCSvS++7NWPO7dWQ==" TotalPrice="AUD400.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD400.70" ApproximateBasePrice="AUD186.00" Taxes="AUD214.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="tka/gb2ZTA2wGGOhSnmrsA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H5M0S">
                    <air:AirSegmentRef Key="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:AirSegmentRef Key="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="SUAiPuzNQL6cKVvX440AWg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="DzIOxZNqSfC9o6mVXTI1pQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H10M0S">
                    <air:AirSegmentRef Key="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:AirSegmentRef Key="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="v1rSVORfTjKP7zCFZb/bpg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="I+01Xb9NTJiRDVrPNdlqVQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="r5OiIbWURiO7ia6rwWC0FA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="TOw6FpKrS0qxDzAydZ/4hw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="r5OiIbWURiO7ia6rwWC0FA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="UJLHst/9RZm/5FyJgPEYiw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="9JK9S2wWQfCwUiSi33ap/Q=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="1PBV5L2hTuerOJsmTd4rHQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9JK9S2wWQfCwUiSi33ap/Q=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="l03G+IxQSsqP2O3ajGccPw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H10M0S">
                    <air:AirSegmentRef Key="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:AirSegmentRef Key="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="RR60kwVCRGyJ61UR9R+Mow==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="TOkYXW6DSPqJGwCGQBmhhw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="r5OiIbWURiO7ia6rwWC0FA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="oUH9Nr1yTfqE0FGMpFJMqg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="r5OiIbWURiO7ia6rwWC0FA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="nmq4BBQ5Txa1dSAg1lYecg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="9JK9S2wWQfCwUiSi33ap/Q=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="58ulCEedT0uyXO3xv9wBug==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9JK9S2wWQfCwUiSi33ap/Q=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="fHoBffLzRbKsZtZkvaHT2g==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:AirSegmentRef Key="imT9JQ8JQsS8P6zyFPdfXg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="lw+dWR3pRVGAdkLh+O4W0g==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="imT9JQ8JQsS8P6zyFPdfXg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="JcjMiYpfRFaj7ba0nxTNag==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H5M0S">
                    <air:AirSegmentRef Key="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:AirSegmentRef Key="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="/J7qDYCOSkCHT2ZSiWQDNQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="caEHSwMxTLOez6JyCOmX7Q==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="r5OiIbWURiO7ia6rwWC0FA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="23fV4zAITECV6jJikSWWWQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="r5OiIbWURiO7ia6rwWC0FA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Myx7A+yaSw6frS9OGHXNHg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="9JK9S2wWQfCwUiSi33ap/Q=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="B0LUZy6STjilYT2iphCi9Q==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9JK9S2wWQfCwUiSi33ap/Q=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="ZEXy4qF5RwWDOd5+ZMzBlg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:AirSegmentRef Key="imT9JQ8JQsS8P6zyFPdfXg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="+bcVWeTlRWesNF0sFBkvRw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="imT9JQ8JQsS8P6zyFPdfXg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="+pbg7aXHSFWinlTE3SWPBQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H5M0S">
                    <air:AirSegmentRef Key="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:AirSegmentRef Key="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="s+Pnz2w1RT2e5oXXnI9X4A==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="SYAApW2yQZKQOdEzDYSVJw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H10M0S">
                    <air:AirSegmentRef Key="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:AirSegmentRef Key="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="MTUWPl+iQniEMarOfdynHA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="vfqv6FijRnGudy/cYOGVxw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="9JK9S2wWQfCwUiSi33ap/Q=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="sAHgaWTsQa+fhBZiSh2hWQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9JK9S2wWQfCwUiSi33ap/Q=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="q0K7XT+EScK0F8MmpBbAAg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:AirSegmentRef Key="imT9JQ8JQsS8P6zyFPdfXg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="mnuVGwsJT926T51Re7lXYg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="imT9JQ8JQsS8P6zyFPdfXg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="4NWjYnSmSzaKr42gDB28cA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H5M0S">
                    <air:AirSegmentRef Key="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:AirSegmentRef Key="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="enUxriEhQami7lOCidmziA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="us5L9VRCTe2qg0X2ZEr84Q==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H10M0S">
                    <air:AirSegmentRef Key="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:AirSegmentRef Key="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="1xGLaQceTMe+8BtYTGfAyw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="ccniwmIAS4GLDR/MLNBnEg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="r5OiIbWURiO7ia6rwWC0FA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="KggdWm5KTxSp18c/jJ2Q2g==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="r5OiIbWURiO7ia6rwWC0FA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="/NhibFefQkKe4bR8jL91hA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:AirSegmentRef Key="imT9JQ8JQsS8P6zyFPdfXg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="eomInNz/RBmBAzAGr4pt0g==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="imT9JQ8JQsS8P6zyFPdfXg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="iXHK/nGwRxCTHykCAjzwVw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT3H55M0S">
                    <air:AirSegmentRef Key="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:AirSegmentRef Key="355Hp5j8S6K50XrJtKw8Xg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="zZ7eSUW4SU2Tgega/jCaug==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="355Hp5j8S6K50XrJtKw8Xg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="KyqQX+jKQtSxqIBXJ0Q9nA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H5M0S">
                    <air:AirSegmentRef Key="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:AirSegmentRef Key="nbtt/WzlQzelHwku9IC6RQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="VVX4aralSqev8DZfXxBuWQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="nbtt/WzlQzelHwku9IC6RQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Wp1L5IZjTmmgASspMKNVuQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT3H55M0S">
                    <air:AirSegmentRef Key="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:AirSegmentRef Key="355Hp5j8S6K50XrJtKw8Xg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="bBOTCSPLQUuMBNFtB71H3w==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="355Hp5j8S6K50XrJtKw8Xg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="pDBNMgniSp6P6h5WwZ2h5g==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H5M0S">
                    <air:AirSegmentRef Key="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:AirSegmentRef Key="nbtt/WzlQzelHwku9IC6RQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="XQ33pb4wR0eo6FKbDIYwTQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="nbtt/WzlQzelHwku9IC6RQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="dFKVTJgAReOJ4gX99Hmk0w==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H10M0S">
                    <air:AirSegmentRef Key="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:AirSegmentRef Key="LwlLk/zoTDeZXfNXGthq/w=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="Q6uUhYpzRmm+I4fdOdnrYA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="LwlLk/zoTDeZXfNXGthq/w=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Qhwua2zISHe2n+AvdHgyIg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H10M0S">
                    <air:AirSegmentRef Key="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:AirSegmentRef Key="LwlLk/zoTDeZXfNXGthq/w=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="PYtDgoP6Tai3XEx7iA/ejw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="LwlLk/zoTDeZXfNXGthq/w=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="LOCBkLrTS+2TTBElno69Xw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H20M0S">
                    <air:AirSegmentRef Key="GHe+AGw6QouHVx/z/OCQcg=="/>
                    <air:AirSegmentRef Key="S0C4lyciTySTL9S/soE8uQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="MvfBJ2CzRdCmwsl0NZmCsQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="GHe+AGw6QouHVx/z/OCQcg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="S0C4lyciTySTL9S/soE8uQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="LjrFTKUJTiqxbmc9UAHdsw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H20M0S">
                    <air:AirSegmentRef Key="GHe+AGw6QouHVx/z/OCQcg=="/>
                    <air:AirSegmentRef Key="S0C4lyciTySTL9S/soE8uQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="enBrPO/WQOWYb6U/QseT5w==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="GHe+AGw6QouHVx/z/OCQcg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="S0C4lyciTySTL9S/soE8uQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="+OcrNCDPRxuQjNOAoOQXbQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H40M0S">
                    <air:AirSegmentRef Key="JvgIQZpcQbiktjpQFThxaw=="/>
                    <air:AirSegmentRef Key="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="2fvX/r9fROqsRjZ/aD30pA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JvgIQZpcQbiktjpQFThxaw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="rmNhJIUfRKOGUsXGSrPokA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H40M0S">
                    <air:AirSegmentRef Key="JvgIQZpcQbiktjpQFThxaw=="/>
                    <air:AirSegmentRef Key="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="Ga+l3MN0QpCIuvb1ZSalGw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JvgIQZpcQbiktjpQFThxaw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="E5XpdkTeQPe5zr9zS9hIKA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H55M0S">
                    <air:AirSegmentRef Key="P1QUPVFGTIW4wlxeoo+0Fw=="/>
                    <air:AirSegmentRef Key="355Hp5j8S6K50XrJtKw8Xg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="xb/TZpwWSNWKwllUryYuxQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="P1QUPVFGTIW4wlxeoo+0Fw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="355Hp5j8S6K50XrJtKw8Xg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="dTyEGxfGROCcZNSdWA5z2g==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H55M0S">
                    <air:AirSegmentRef Key="P1QUPVFGTIW4wlxeoo+0Fw=="/>
                    <air:AirSegmentRef Key="355Hp5j8S6K50XrJtKw8Xg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="mHjI/a6DRECYxmqOOYly/Q==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="P1QUPVFGTIW4wlxeoo+0Fw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="355Hp5j8S6K50XrJtKw8Xg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Hw3ZIA8qT+Si1FsTw8jIrA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H55M0S">
                    <air:AirSegmentRef Key="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:AirSegmentRef Key="1HBZHp8nRr+3A85fANwnRQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="hgbjlObUSYyAK+FM82r3ZA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="1HBZHp8nRr+3A85fANwnRQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="z2Fbt5QzRoC2F7RqjrTh3A==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT4H55M0S">
                    <air:AirSegmentRef Key="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:AirSegmentRef Key="1HBZHp8nRr+3A85fANwnRQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="TvaLvJExS8qLkERRhzmikw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="TqhfoG8OTkCovr5ZpOB+3Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="1HBZHp8nRr+3A85fANwnRQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="5iSIL0tGSUWeiEwCtEkA/A==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H10M0S">
                    <air:AirSegmentRef Key="RQyVi/GpTlyWYn7E67ASaA=="/>
                    <air:AirSegmentRef Key="LwlLk/zoTDeZXfNXGthq/w=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="4tN2kz5wTheBXdnJwLo2TQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="RQyVi/GpTlyWYn7E67ASaA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="LwlLk/zoTDeZXfNXGthq/w=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="sPbAogKVTc6KtQyxsIioNg==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H10M0S">
                    <air:AirSegmentRef Key="RQyVi/GpTlyWYn7E67ASaA=="/>
                    <air:AirSegmentRef Key="LwlLk/zoTDeZXfNXGthq/w=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="xrGmqpPAQRum95zBbfkiLA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="RQyVi/GpTlyWYn7E67ASaA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="LwlLk/zoTDeZXfNXGthq/w=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Ym/6eewbRnevX/wcAz+vog==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H20M0S">
                    <air:AirSegmentRef Key="ti7BM8fTT6WGBc4+GxzmPg=="/>
                    <air:AirSegmentRef Key="S0C4lyciTySTL9S/soE8uQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="YeYwNN1xS7WxjpLoumrsXw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="ti7BM8fTT6WGBc4+GxzmPg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="S0C4lyciTySTL9S/soE8uQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="lnZAKYXBQn6PHc7DeAfgFQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H20M0S">
                    <air:AirSegmentRef Key="ti7BM8fTT6WGBc4+GxzmPg=="/>
                    <air:AirSegmentRef Key="S0C4lyciTySTL9S/soE8uQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="HAOmkFABSPe0X7I1/mxb1A==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="ti7BM8fTT6WGBc4+GxzmPg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="S0C4lyciTySTL9S/soE8uQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="AJjYg9w6QtuwUfNQ4r7hhA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H40M0S">
                    <air:AirSegmentRef Key="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:AirSegmentRef Key="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="UCKpAFSvQ7awS3OaFA0Q4w==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="4ucWMG2rR+Gn1TTC05mWWA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H40M0S">
                    <air:AirSegmentRef Key="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:AirSegmentRef Key="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="XttzrfNsRFeXDCRpz9Xp8Q==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Su5YXkmfTMKy9tv1yW4dHg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="B2uwJetNRbqYZJ4U/GbO6Q=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="T+ElOUlzRmiEWfrxskcorQ==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H55M0S">
                    <air:AirSegmentRef Key="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:AirSegmentRef Key="355Hp5j8S6K50XrJtKw8Xg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="/onWu//dS7G9I2CN7PwvoA==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="355Hp5j8S6K50XrJtKw8Xg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="KwR0SaijTsuqRV1ItGOJ3g==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" ApproximateTaxes="AUD230.10">
                <air:Journey TravelTime="P0DT5H55M0S">
                    <air:AirSegmentRef Key="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:AirSegmentRef Key="355Hp5j8S6K50XrJtKw8Xg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="ScqscFIFSb6RZpW8TGFKNw==" TotalPrice="AUD416.10" BasePrice="AUD186.00" ApproximateTotalPrice="AUD416.10" ApproximateBasePrice="AUD186.00" Taxes="AUD230.10" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="355Hp5j8S6K50XrJtKw8Xg=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="1AyvLzqARxGuGRxltTWU8Q==" TotalPrice="AUD427.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD427.70" ApproximateBasePrice="AUD186.00" Taxes="AUD241.70" ApproximateTaxes="AUD241.70">
                <air:Journey TravelTime="P0DT15H20M0S">
                    <air:AirSegmentRef Key="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:AirSegmentRef Key="S0C4lyciTySTL9S/soE8uQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="W9rfluS3QK+6Vi4XP1ip3g==" TotalPrice="AUD427.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD427.70" ApproximateBasePrice="AUD186.00" Taxes="AUD241.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="S0C4lyciTySTL9S/soE8uQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="zT4W9eWDSBK2eLfr3VLIYQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD23.20"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="cEVKLnvsQ5OUIntUmMcISA==" TotalPrice="AUD427.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD427.70" ApproximateBasePrice="AUD186.00" Taxes="AUD241.70" ApproximateTaxes="AUD241.70">
                <air:Journey TravelTime="P0DT15H20M0S">
                    <air:AirSegmentRef Key="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:AirSegmentRef Key="S0C4lyciTySTL9S/soE8uQ=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="tepm1TpTQtStK+zKD9emgA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="u/XOsX/vRtqwcnIUn0hKfg==" TotalPrice="AUD427.70" BasePrice="AUD186.00" ApproximateTotalPrice="AUD427.70" ApproximateBasePrice="AUD186.00" Taxes="AUD241.70" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="Q2l7/1cmRmq6hOzHM4kH9Q=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="rSB8RXP8SS2e2QjJxXmJ5w=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="S0C4lyciTySTL9S/soE8uQ=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="Q2l7/1cmRmq6hOzHM4kH9Q==" SegmentRef="tepm1TpTQtStK+zKD9emgA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD23.20"/>
                    <air:TaxInfo Category="RA" Amount="AUD31.70"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD118.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="7MQyHq0+SiGqjRZ0Wq4n6w==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" ApproximateTaxes="AUD220.90">
                <air:Journey TravelTime="P0DT4H15M0S">
                    <air:AirSegmentRef Key="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="rB6qpxi+SbqVd+iW4Exsxg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="17GMgvzrQc6sVz6E5DzqGg==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="rB6qpxi+SbqVd+iW4Exsxg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="qS8qN+J/TIew9yrZiZ0Azw==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" ApproximateTaxes="AUD220.90">
                <air:Journey TravelTime="P0DT7H25M0S">
                    <air:AirSegmentRef Key="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="qsPJ4KZsSOay61g4yv5V0g==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="YR8OXKCcQCypCEuFFWV5cw==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" ApproximateTaxes="AUD220.90">
                <air:Journey TravelTime="P0DT4H15M0S">
                    <air:AirSegmentRef Key="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="qaokA7TXQ+S7bT5T3g2gxA==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="nHqIHStzSeeTrNmwKxKtaA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5+6i/4EUR/a/CaglJJ6PAQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="i7+yurHFT8WqzgQnF4y1EA==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" ApproximateTaxes="AUD220.90">
                <air:Journey TravelTime="P0DT7H25M0S">
                    <air:AirSegmentRef Key="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:AirSegmentRef Key="SxA5vEP6S4SsFW/xg/Llyw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="rB6qpxi+SbqVd+iW4Exsxg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="NKIVNdxsTI6YyRjYdnspgA==" TotalPrice="AUD438.90" BasePrice="AUD218.00" ApproximateTotalPrice="AUD438.90" ApproximateBasePrice="AUD218.00" Taxes="AUD220.90" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="Cte40hmXQKGoDZ7cb/HElQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="SxA5vEP6S4SsFW/xg/Llyw=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="rB6qpxi+SbqVd+iW4Exsxg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD16.30"/>
                    <air:TaxInfo Category="RD" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="0"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="NminGh2+TtCOnvnLxJUmyA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H5M0S">
                    <air:AirSegmentRef Key="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:AirSegmentRef Key="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="Bm/rIOTKSNOeewraOMWMag==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="WQwTt37YTV+M3m9dUdobIg==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H10M0S">
                    <air:AirSegmentRef Key="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:AirSegmentRef Key="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="KJGRWc5PRWeQ/8BHseZTFw==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="5NhUhZv+QOWcwMbLNbuhqQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="QjO0cVT/TUquQvZebEC4kg==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="r5OiIbWURiO7ia6rwWC0FA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="Bed+yfnxS6ijny65Jq1TsA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="r5OiIbWURiO7ia6rwWC0FA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="5AUzJYFnSiaRt8TGcKE28Q==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="9JK9S2wWQfCwUiSi33ap/Q=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="J5TnJ/oWRsODbDtIY5QH0Q==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9JK9S2wWQfCwUiSi33ap/Q=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="uMse9YMHTFOKG1REJ8mwXQ==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT4H45M0S">
                    <air:AirSegmentRef Key="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:AirSegmentRef Key="imT9JQ8JQsS8P6zyFPdfXg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="iSHvuAMhQQ2JafuJXT21Uw==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="imT9JQ8JQsS8P6zyFPdfXg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="+uYq1neNRsi3RYTb2GZi9w==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT5H5M0S">
                    <air:AirSegmentRef Key="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:AirSegmentRef Key="wLMFFwqEQiu6CkAnUv8eAw=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="gG5xcv/FR7i1JPUJcoUvKg==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="wLMFFwqEQiu6CkAnUv8eAw=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="2jKJF5vSToSzso1MPt6nOA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT5H10M0S">
                    <air:AirSegmentRef Key="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:AirSegmentRef Key="ZFPnJuvcQKe/OGHrjNwT3A=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="PhzZWE9mSAGsyfau+j5/bw==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZFPnJuvcQKe/OGHrjNwT3A=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="lfIJ9UM7THizVabDB6VqBA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT5H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="+jJWxy0sSEmUah8D/stGfw==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="MVstOIOnScuuLuJ722VS5A==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT5H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="BEmrbNOoQbCDG/GOZChssg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="x9q5zrYER7ybcp51UVvqSQ==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="BEmrbNOoQbCDG/GOZChssg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="lzhutAEfQCOnbCaM9Sgpew==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT5H45M0S">
                    <air:AirSegmentRef Key="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:AirSegmentRef Key="r5OiIbWURiO7ia6rwWC0FA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="VhaWJ6U5QnuR9d7Vv6vYSw==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="r5OiIbWURiO7ia6rwWC0FA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="JzmfagvPRsW02lDPkrId2A==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT6H0M0S">
                    <air:AirSegmentRef Key="swXDM1EGRLqHibO57RMxUQ=="/>
                    <air:AirSegmentRef Key="P+YAEe2rQK+MslSihk6ejg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="4kSu4JLJQNGXBpHufv2myA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="swXDM1EGRLqHibO57RMxUQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="P+YAEe2rQK+MslSihk6ejg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="L63Gk42hQbunOHALVmcQBA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT6H5M0S">
                    <air:AirSegmentRef Key="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:AirSegmentRef Key="E6Pcr2dMSq+TKd4bklCTVw=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="cmhAnDW2RYagPDo8JcAM+g==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="ZhmvEtz7QBCY02d9hW1t7A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="E6Pcr2dMSq+TKd4bklCTVw=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="g/iCNYe6TE65vUG/r/cv4A==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT6H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="wLMFFwqEQiu6CkAnUv8eAw=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="qGfMFyLeT+ylHnpJCIxRFQ==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="wLMFFwqEQiu6CkAnUv8eAw=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="gbgEHnBoSzuYKtr6s9fgfA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT6H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="Qy+2nJz/RMWOyFrQs8M+5Q=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="qTr9pfSbQ5mk+aJbexNyqQ==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="Qy+2nJz/RMWOyFrQs8M+5Q=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="StSreOxiSlKoGJQbizV3ew==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT6H45M0S">
                    <air:AirSegmentRef Key="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:AirSegmentRef Key="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="tqG459oBSFyZxM/XW6RmUg==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="8pN92PpIT8aIMk7m/vx5kg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="1XdRzBCDS3SPCY9mPjJ7wQ=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="Q9FnxngSQdKLR/6xoXMkzw==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT7H0M0S">
                    <air:AirSegmentRef Key="swXDM1EGRLqHibO57RMxUQ=="/>
                    <air:AirSegmentRef Key="9JK9S2wWQfCwUiSi33ap/Q=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="zMVlvi3RSPyJw7FVKgDh3A==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="swXDM1EGRLqHibO57RMxUQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9JK9S2wWQfCwUiSi33ap/Q=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="/g8HLxMDRhKUnTYUke9eMA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT7H10M0S">
                    <air:AirSegmentRef Key="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:AirSegmentRef Key="P+YAEe2rQK+MslSihk6ejg=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="E7mzFwV4QxGAcM4I24JWzQ==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lR/WkEQ4Q5ypZ/F5nMDYDQ=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="P+YAEe2rQK+MslSihk6ejg=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="gZ3guhCtSrippgirzpxe/Q==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT7H35M0S">
                    <air:AirSegmentRef Key="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:AirSegmentRef Key="E6Pcr2dMSq+TKd4bklCTVw=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="aIu75zXCTS+41px/EnVUXA==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="9/nEsqgtTxyz6UcynQWL/A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="E6Pcr2dMSq+TKd4bklCTVw=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="rUpUyjobQ/Wqbzj+fsJ88Q==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" ApproximateTaxes="AUD236.30">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT7H45M0S">
                    <air:AirSegmentRef Key="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:AirSegmentRef Key="lLv0BMvtTDiLWH/CGLZvTA=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="NWOlMRmMRlGECjdriyltvQ==" TotalPrice="AUD454.30" BasePrice="AUD218.00" ApproximateTotalPrice="AUD454.30" ApproximateBasePrice="AUD218.00" Taxes="AUD236.30" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="9hlay8dYQyCQ2i94wS8stg=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="yoihV95CSrKpQ+f8eOR+tA=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="9hlay8dYQyCQ2i94wS8stg==" SegmentRef="lLv0BMvtTDiLWH/CGLZvTA=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="RD" Amount="AUD31.70"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD124.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
                <air:Connection SegmentIndex="1"/>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="c7tmWIKpQFe5++opn712KA==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" ApproximateTaxes="AUD181.40">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="fpdQYAEHQNS2IxkoG1MpQw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="AUiugnATSWCIfwjBzvp50g==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="tMJljYi6Trenck7JxzAT4A=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="fpdQYAEHQNS2IxkoG1MpQw=="/>
                    <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="tMJljYi6Trenck7JxzAT4A==" SegmentRef="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD101.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="7QupsqQvR5mSTf3i88n6TQ==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" ApproximateTaxes="AUD181.40">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="PQaDiZw3Q5yc7mB/10xXYg=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="gY3ulGI+QLqDvaRO3of13A==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="tMJljYi6Trenck7JxzAT4A=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="PQaDiZw3Q5yc7mB/10xXYg=="/>
                    <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="tMJljYi6Trenck7JxzAT4A==" SegmentRef="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD101.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="eIWr48qkTueLiQkdbp7pYA==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" ApproximateTaxes="AUD181.40">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="pmd7ajJESoqWZP4S1+lcEw=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="UqoekE6SQmeFTjSTavuW3w==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="tMJljYi6Trenck7JxzAT4A=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="pmd7ajJESoqWZP4S1+lcEw=="/>
                    <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="tMJljYi6Trenck7JxzAT4A==" SegmentRef="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD101.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="E96bLozCTUumiIFszDvwGQ==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" ApproximateTaxes="AUD181.40">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="NjV+t7AyQxO5Hta7CMhZsA=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="Blyn/e4cSkuVKLXBTn20Ng==" TotalPrice="AUD496.40" BasePrice="AUD315.00" ApproximateTotalPrice="AUD496.40" ApproximateBasePrice="AUD315.00" Taxes="AUD181.40" LatestTicketingTime="2014-11-04T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vJ9DP4ZmSmqIKCOmYf8y3Q=="/>
                    <air:FareInfoRef Key="tMJljYi6Trenck7JxzAT4A=="/>
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="vJ9DP4ZmSmqIKCOmYf8y3Q==" SegmentRef="NjV+t7AyQxO5Hta7CMhZsA=="/>
                    <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="tMJljYi6Trenck7JxzAT4A==" SegmentRef="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD101.30"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
            <air:AirPricingSolution Key="8fLZHU3ORCW29xAMmU9Gsw==" TotalPrice="AUD534.60" BasePrice="AUD347.00" ApproximateTotalPrice="AUD534.60" ApproximateBasePrice="AUD347.00" Taxes="AUD187.60" ApproximateTaxes="AUD187.60">
                <air:Journey TravelTime="P0DT2H5M0S">
                    <air:AirSegmentRef Key="JjDNkARoTdqCCgGqOnPk4g=="/>
                </air:Journey>
                <air:Journey TravelTime="P0DT2H0M0S">
                    <air:AirSegmentRef Key="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                </air:Journey>
                <air:LegRef Key="WIRsoYzxQ6CxC2ybzv/U4g=="/>
                <air:LegRef Key="GSeo8Zy/TcSN0pQyJ6BSQA=="/>
                <air:AirPricingInfo Key="gTWVMJktS36NEpITetA7EA==" TotalPrice="AUD534.60" BasePrice="AUD347.00" ApproximateTotalPrice="AUD534.60" ApproximateBasePrice="AUD347.00" Taxes="AUD187.60" LatestTicketingTime="2014-11-06T23:59:00.000+00:00" PricingMethod="Auto" ETicketability="Yes" PlatingCarrier="LH" ProviderCode="1P">
                    <air:FareInfoRef Key="vlCgGiAKSDCaOzvRGKbhcA=="/>
                    <air:FareInfoRef Key="tMJljYi6Trenck7JxzAT4A=="/>
                    <air:BookingInfo BookingCode="S" CabinClass="Economy" FareInfoRef="vlCgGiAKSDCaOzvRGKbhcA==" SegmentRef="JjDNkARoTdqCCgGqOnPk4g=="/>
                    <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="tMJljYi6Trenck7JxzAT4A==" SegmentRef="8W7yDpEbRfm+rhX4jT6Z6g=="/>
                    <air:TaxInfo Category="DE" Amount="AUD8.60"/>
                    <air:TaxInfo Category="OY" Amount="AUD11.60"/>
                    <air:TaxInfo Category="RA" Amount="AUD29.60"/>
                    <air:TaxInfo Category="JD" Amount="AUD23.60"/>
                    <air:TaxInfo Category="OG" Amount="AUD0.90"/>
                    <air:TaxInfo Category="QV" Amount="AUD5.80"/>
                    <air:TaxInfo Category="YQ" Amount="AUD107.50"/>
                    <air:PassengerType Code="ADT"/>
                </air:AirPricingInfo>
            </air:AirPricingSolution>
        </air:LowFareSearchRsp>
    </SOAP:Body>
</SOAP:Envelope>  
EOM;

$soap = new SimpleXMLElement($result);
$soap->registerXPathNamespace('air', 'http://www.travelport.com/schema/air_v26_0');

$flightDetails = $soap->xpath("//air:LowFareSearchRsp/air:FlightDetailsList/air:FlightDetails");


$airSegment = $soap->xpath("//air:LowFareSearchRsp/air:AirSegmentList/air:AirSegment");
$airAvailInfo = $soap->xpath("//air:LowFareSearchRsp/air:AirSegmentList/air:AirSegment/air:AirAvailInfo");
$bookingCodeInfo = $soap->xpath("//air:LowFareSearchRsp/air:AirSegmentList/air:AirSegment/air:AirAvailInfo/air:BookingCodeInfo");
$flightDetailsRef = $soap->xpath("//air:LowFareSearchRsp/air:AirSegmentList/air:AirSegment/air:FlightDetailsRef");

//var_dump($flightDetails);
//$airPlaneDetails = array();
//foreach ($flightDetails as $index => $container) {
//    $referenceKey = $container->attributes()["Key"];
//    foreach ($airSegment[$index]->attributes() as $segmentName => $segmentValue) {
//        $airPlaneDetails[$referenceKey]['AirSegment'][$segmentName] = $segmentValue;
//    }
//
//    foreach ($airAvailInfo[$index]->attributes() as $airAvailInfoName => $airAvailInfoValue) {
//        $airPlaneDetails[$referenceKey]['AirAvailInfo'][$airAvailInfoName] = $airAvailInfoValue;
//    }
//
//    foreach ($bookingCodeInfo[$index]->attributes() as $bookingCodeInfoName => $bookingCodeInfoValue) {
//        $airPlaneDetails[$referenceKey]['BookingCodeInfo'][$bookingCodeInfoName] = $bookingCodeInfoValue;
//    }
//
//    foreach ($flightDetailsRef[$index]->attributes() as $flightDetailsRefName => $flightDetailsRefValue) {
//        $airPlaneDetails[$referenceKey]['FlightDetailsRef'][$flightDetailsRefName] = $flightDetailsRefValue;
//    }
//
//    foreach ($container->attributes() as $name => $value) {
//        echo $name, " - ", $value, "<br/>";
//    }
//}
echo $result;
$segmentDetails = array();
foreach ($airSegment as $index => $container) {

    $referenceKey = $airSegment[$index]->attributes()['Key'];
    foreach ($airSegment[$index]->attributes() as $segmentName => $segmentValue) {
        $segmentDetails["$referenceKey"][$segmentName] = $segmentValue;
    }

    foreach ($airAvailInfo[$index]->attributes() as $airAvailInfoName => $airAvailInfoValue) {
        $segmentDetails["$referenceKey"]['AirAvailInfo'][$airAvailInfoName] = $airAvailInfoValue;
    }

    foreach ($bookingCodeInfo[$index]->attributes() as $bookingCodeInfoName => $bookingCodeInfoValue) {
        $segmentDetails["$referenceKey"]['BookingCodeInfo'][$bookingCodeInfoName] = $bookingCodeInfoValue;
    }

    foreach ($flightDetailsRef[$index]->attributes() as $flightDetailsRefName => $flightDetailsRefValue) {
        $segmentDetails["$referenceKey"]['FlightDetailsRef'][$flightDetailsRefName] = $flightDetailsRefValue;
    }

    foreach ($flightDetails[$index]->attributes() as $flightDetailsName => $flightDetailsValue) {
        $segmentDetails["$referenceKey"]['FlightDetails'][$flightDetailsName] = $flightDetailsValue;
    }
}
//var_dump($segmentDetails);
//foreach ($flightDetails as $index => $container) {
//    echo "=========$index============<br/>";
//    foreach ($airSegment[$index]->attributes() as $segmentName => $segmentValue) {
//        echo $segmentName," - ", $segmentValue,"<br/>";
//    }
//    echo "*********$index***********<br/>";
//    foreach ($airAvailInfo[$index]->attributes() as $airAvailInfoName => $airAvailInfoValue) {
//        echo $airAvailInfoName," - ", $airAvailInfoValue,"<br/>";
//    }
//    echo "##########$index###########<br/>";
//    foreach ($bookingCodeInfo[$index]->attributes() as $bookingCodeInfoName => $bookingCodeInfoValue) {
//        echo $bookingCodeInfoName," - ", $bookingCodeInfoValue,"<br/>";
//    }
//    echo "//////////$index///////////<br/>";
//    foreach ($flightDetailsRef[$index]->attributes() as $flightDetailsRefName => $flightDetailsRefValue) {
//        echo $flightDetailsRefName," - ", $flightDetailsRefValue,"<br/>";
//    }
//    echo "+++++++++$index++++++++++++<br/>";
//    foreach ($container->attributes() as $name => $value) {
//        echo $name," - ", $value,"<br/>";
//    }
//}

$airPricingSolution = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution");
$journey = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:Journey");
$journeyAirSegmentRef = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:Journey/air:AirSegmentRef");
$legRef = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:LegRef");
$airPricingInfo = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:AirPricingInfo");
$fareInfoRef = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:AirPricingInfo/air:FareInfoRef");
$bookingInfo = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:AirPricingInfo/air:BookingInfo");
$taxInfo = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:AirPricingInfo/air:TaxInfo");
$passengerType = $soap->xpath("//air:LowFareSearchRsp/air:AirPricingSolution/air:AirPricingInfo/air:PassengerType");

$taxInfoContaier = array_chunk($taxInfo, 5);

foreach ($airPricingSolution as $priceKey => $priceContainer) {
    $duplicateKey1 = $priceKey * 2;
    $duplicateKey2 = $duplicateKey1++;
    //echo "+++++++++$priceKey++++++++++++<br/>";
    foreach ($priceContainer->attributes() as $priceName => $priceValue) {
        //echo $priceName, " - ", $priceValue, "<br/>";
    }
    //echo "******<br/>";
    foreach ($journey[$duplicateKey1]->attributes() as $journeyName1 => $journeyValue1) {
        //echo $journeyName1, " - ", $journeyValue1, "<br/>";
    }
    //echo "!!!!!!!<br/>";
    foreach ($journey[$duplicateKey2]->attributes() as $journeyName2 => $journeyValue2) {
        //echo $journeyName2, " - ", $journeyValue2, "<br/>";
    }
    //echo "@@@@@@<br/>";
    foreach ($journeyAirSegmentRef[$duplicateKey1]->attributes() as $journeyAirSegmentRefName1 => $journeyAirSegmentRefValue1) {
        //echo $journeyAirSegmentRefName1, " - ", $journeyAirSegmentRefValue1, "<br/>";
    }
    //echo "#####<br/>";
    foreach ($journeyAirSegmentRef[$duplicateKey2]->attributes() as $journeyAirSegmentRefName2 => $journeyAirSegmentRefValue2) {
        //echo $journeyAirSegmentRefName2, " - ", $journeyAirSegmentRefValue2, "<br/>";
    }
    //echo "@@@@@@<br/>";
    foreach ($legRef[$duplicateKey1]->attributes() as $legRefName1 => $legRefValue1) {
        //echo $legRefName1, " - ", $legRefValue1, "<br/>";
    }
    //echo "#####<br/>";
    foreach ($legRef[$duplicateKey2]->attributes() as $legRefName2 => $legRefValue2) {
        //echo $legRefName2, " - ", $legRefValue2, "<br/>";
    }
    //echo "@@@@@@<br/>";
    foreach ($fareInfoRef[$duplicateKey1]->attributes() as $fareInfoRefName1 => $fareInfoRefValue1) {
        //echo $fareInfoRefName1, " - ", $fareInfoRefValue1, "<br/>";
    }
    //echo "#####<br/>";
    foreach ($fareInfoRef[$duplicateKey2]->attributes() as $fareInfoRefName2 => $fareInfoRefValue2) {
        //echo $fareInfoRefName2, " - ", $fareInfoRefValue2, "<br/>";
    }
    //echo "@@@@@@<br/>";
    foreach ($bookingInfo[$duplicateKey1]->attributes() as $bookingInfoName1 => $bookingInfoValue1) {
        //echo $bookingInfoName1, " - ", $bookingInfoValue1, "<br/>";
    }
    //echo "#####<br/>";
    foreach ($bookingInfo[$duplicateKey2]->attributes() as $bookingInfoName2 => $bookingInfoValue2) {
        //echo $bookingInfoName2, " - ", $bookingInfoValue2, "<br/>";
    }
    //echo "@@@@@@<br/>";
    foreach ($airPricingInfo[$priceKey]->attributes() as $airPricingInfoName => $airPricingInfoValue) {
        //echo $airPricingInfoName, " - ", $airPricingInfoValue, "<br/>";
    }
    //echo "$$$$$<br/>";
    foreach ($passengerType[$priceKey]->attributes() as $passengerTypeName => $passengerTypeValue) {
        //echo $passengerTypeName, " - ", $passengerTypeValue, "<br/>";
    }

    //echo "&&&&&&&<br/>";
    foreach ($taxInfoContaier[$priceKey] as $taxInfoKey => $taxInfoValueContainer) {
        foreach ($taxInfoValueContainer->attributes() as $taxInfoName => $taxInfoValue) {
            //echo $taxInfoName, " - ", $taxInfoValue, "<br/>";
        }
    }

    $referenceKey = $journeyAirSegmentRef[$duplicateKey1]->attributes()['Key'];
    $segmentDetails["$referenceKey"][$segmentName];
    $arrivalTime = $segmentDetails["$referenceKey"]['ArrivalTime'];
    $flightNumber = $segmentDetails["$referenceKey"]['FlightNumber'];
    $origin = $segmentDetails["$referenceKey"]["Origin"];
    $destination = $segmentDetails["$referenceKey"]["Destination"];
    $flightTime = $segmentDetails["$referenceKey"]["FlightTime"];
    $availabilitySource = $segmentDetails["$referenceKey"]["AvailabilitySource"];
    
    $totalPrice = $airPricingInfo[$priceKey]->attributes()["TotalPrice"];
    $cabinClass =  $bookingInfo[$duplicateKey1]->attributes()["CabinClass"];
    
    ?>
    <div class="streamer" style="float: left; margin: 0 10px 10px 0; width: auto">
        <div class="events" style="overflow-x: hidden; padding: 0">
            <div class="event-stream" style="height: 74px">
                <div class="event" style="min-width: 260px; height: 72px;">
                    <div class="event-content">
                        <div class="event-content-logo" style="padding: 1px;">
                            <div class="icon" style="color: #4291cb; border: 1px solid rgba(53,60,205,0.2); background: rgb(236,236,246);padding: 8px 0; font-size: 1.2em; text-align: center;">
                                <?php echo substr($arrivalTime, 0, 4); ?></div>
                            <div class="time" style="background-color: rgb(67, 144, 223);">
                                <?php echo substr($arrivalTime, 5, 5); ?></div>
                        </div>
                        <div class="event-content-data" style="margin-left: 46px;">
                            <div class="title" title="Flight number" style="padding: 4px 0;"><?php echo $flightNumber; ?></div>
                            <div class="title" style="background-color: #ffc656;color: #fff;float: right;margin: -3px 0 0;padding: 4px;position: absolute;right: 0;top: 0;">Price : <?php echo $totalPrice; ?></div>
                            <div class="subtitle" style="mar">From : <?php echo $origin; ?> - To :<?php echo $destination; ?></div>
                            <div class="remark">Flight time is <?php echo $flightTime; ?> and <?php echo $availabilitySource; ?>
                                Class : <?php echo $cabinClass; ?>
                            </div>
                            <div style="float: right; margin: -2px -3px 1px" data-role="input-control" class="input-control radio margin10">
                                <label>
                                    <input type="radio" value="<?php echo $flightNumber; ?>" itemid="<?php echo $priceKey; ?>" class="form_submit_radio" name="flight_selected">
                                    <span class="check"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
} 